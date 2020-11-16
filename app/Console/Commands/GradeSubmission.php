<?php

namespace App\Console\Commands;

use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class GradeSubmission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'submission:grade {submission_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grade submission';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $submission_id = $this->argument('submission_id');
        $submission = Submission::findOrFail($submission_id);
        $problems = Problem::findOrFail($submission->problem_id);

        $submission->point = 100;

        $testcase = Storage::path($problems->testcase);
        $file = Storage::path($submission->file);

        $process = new Process(["./grading_service",
            '--testcase', $testcase,
            '--file', $file,
            '--timeout', 1]);
        $process->setWorkingDirectory(app_path());
        $process->setEnv([
            'PATH' => '/usr/lib/gcc/x86_64-linux-gnu/9:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:'
        ]);

        $process->run();

        if (!$process->isSuccessful()) {
            dd($process->getErrorOutput());
        }

        $output = json_decode(trim($process->getOutput()), true);

        $total_tests = $output['total_tests'];
        $passed_tests = $output['passed_tests'];
        $wrong_tests = $output['wrong_tests'];
        $message = $output['message'];

        $submission->result = "Accepted";
        $submission->point = 100 * (int) $passed_tests / $total_tests;

        if ($passed_tests < $total_tests) {
            $submission->result = "Wrong at test {$wrong_tests}/{$total_tests}";
        }

        $submission->save();
    }
}
