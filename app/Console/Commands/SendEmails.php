<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:info {user*?}';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

      
     $name   = $this->ask('What is your name!');
     if (empty($name)) {
          return $this->error('This Fild is required');
        }


        
     $age = $this->ask('Tell me your age');
     if (empty($age)) {
           return $this->error('This Fild is required');
        }
        
        

        
     $gender = $this->choice('Tell me your gender',['male','female']);
     if (empty($gender)) {
           return $this->error('This Fild is required');
        }


        
        
     $pass   = $this->secret('password');
     if (empty($pass)) {
           return $this->error('This Fild is required');
        }
        


        
      $this->info('Your data is saved successfully');

     $users = [$name,$age,$gender,$pass];
        dump($users);
    }
}