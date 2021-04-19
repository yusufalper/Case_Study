<div class="grid grid-cols-12 gap-x-1">
    <div class="col-span-12 -mt-3">
        <h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-pink-800">
            {{ $dev->developer }}
        </h3>
    </div>

    @for($i = 1; $i <= $devTasks->max('week'); $i++)
    <div class="col-span-6 md:col-span-4 mt-3">
        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-gray-300 text-white">
                    <th colspan="2" class="">
                        <span class="text-red-800 text-center">
                            Week - {{ $i }}
                        </span>
                    </th>
                </tr>
                <tr class="bg-gray-400 text-white">
                    <th class="">
                        <span class="text-indigo-700">
                            Task
                        </span>
                    </th>
                    <th class="">
                        <span class="text-indigo-700">
                            Time (h)
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class=" bg-white">
                @foreach($devTasks->where('week', $i) as $devTask)
                <tr class="border-b border-gray-200 hover:bg-gray-200">
                    <td>
                        <span class="text-center">
                            {{ $devTask->task->name }}
                        </span>
                    </td>
                    <td>
                        <span class="text-center">
                            {{ floor($devTask->comp_time).' hours, ' }}
                            {{ round((($devTask->comp_time - floor($devTask->comp_time))*60), 2).' minutes' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endfor
</div>
