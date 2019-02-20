<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AllocateLeaveCreditsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hris:allocate-leave-credits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Allocate leave credits for all employees. (Should be run once a year only)';

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
     * @return mixed
     */
    public function handle()
    {
        $year = date('Y');

        // Check if there's already an allocation for the current year
        $hasYear = \DB::table('leave_balances')
                        ->select('year')
                        ->where(['year' => $year])
                        ->first();

        // If no allocation yet, add balances
        if (!$hasYear) {
            $users = \DB::table('users')->get();

            foreach ($users as $user) {
                \DB::table('leave_balances')->insert([
                    [
                        'user_id'  => $user->id, 
                        'leave_type_id' => 1, 
                        'used'  => 0, 
                        'allocated' => 12, //Vacation leave
                        'carried_over'  => 0, 
                        'year'  => $year
                    ],
                    [
                        'user_id'  => $user->id, 
                        'leave_type_id' => 2, 
                        'used'  => 0, 
                        'allocated' => 5, //Sick leave
                        'carried_over'  => 0, 
                        'year'  => $year
                    ],
                    [
                        'user_id'  => $user->id, 
                        'leave_type_id' => 3, 
                        'used'  => 0, 
                        'allocated' => 1, //Birthday leave
                        'carried_over'  => 0, 
                        'year'  => $year
                    ],
                ]);
            }

            $this->info('Vacation, Sick and Birthday leaves successfully allocated to users.');
        }
        else {
            $this->error('Leave credits already allocated for this year ' . $year . '.');
        }
    }
}
