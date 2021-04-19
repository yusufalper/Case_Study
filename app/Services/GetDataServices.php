<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

class GetDataServices
{
    public static function getDefaultData(){
        $provider1 = Http::get('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa')->json();
        $provider2 = Http::get('http://www.mocky.io/v2/5d47f235330000623fa3ebf7')->json();
        if ($provider1 && $provider2) {
            Task::query()->delete();
            foreach ($provider1 as $key => $value) {
                Task::create([
                    'name' => $value['id'],
                    'time' => $value['sure'],
                    'difficulty' => $value['zorluk'],
                ]);
            }
            foreach ($provider2 as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    Task::create([
                        'name' => $key2,
                        'time' => $value2['estimated_duration'],
                        'difficulty' => $value2['level'],
                    ]);
                }
            }
            return "Database cleaned and 2 Base Providers' Records Successfully Added to Database.";
        }
        return "Error while process. Please try again";
    }

    public static function getNewProviderData($url){
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $validated = true;
        } else {
            return "Invalid URL.";
        }
        
        if ($validated) {
            $areKeysValid = true;
            $newProvider = Http::get($url)->json();
            if($newProvider){
                foreach ($newProvider as $key => $value) {
                    if (array_key_exists('task', $value) && array_key_exists('time', $value) && array_key_exists('difficulty', $value)) {
                        Task::create([
                            'name' => $value['task'],
                            'time' => $value['time'],
                            'difficulty' => $value['difficulty'],
                        ]);
                    }else {
                        $areKeysValid = false;
                        break;
                    }
                }
                if ($areKeysValid === true) {
                    return "New Provider Successfully Added.";
                }
            }
        }
        return "Invalid Data Type. Data Type should be like this:"."
        [  
            {  
              'difficulty': 3, 
              'time': 6, 
              'task': 'IT Task 0'  
            }, 
            {  
                'difficulty': 3, 
                'time': 6, 
                'task': 'IT Task 0'  
            }, 
            (etc..)  
        ]";
    }
}
