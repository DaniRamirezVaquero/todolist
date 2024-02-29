<table class="w-full mt-8 ">
    <thead>
        <tr class="px-4 py-2 text-left bg-emerald-500/25 rounded-t">
            <th class="border-slate-500 border-r border-b rounded-tl px-4 py-2 text-left">Mon</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">Tue</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">Wed</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">Thu</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">Fri</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">Sat</th>
            <th class="border-slate-500 border-b rounded-tr px-4 py-3 text-left">Sun</th>
        </tr>
    </thead>
    <tbody>
        @php
            $day = 1;
            $daysOffset = $firstDayOfMonth - 1;
            use Carbon\Carbon;
        @endphp

        @for ($i = 0; $i < 6; $i++)
            @if ($day > $daysInMonth)
            @break
        @endif

        <tr>
            @for ($j = 0; $j < 7; $j++)
                @if ($day <= $daysInMonth && ($i > 0 || $j >= $daysOffset))
                    @php
                        $dateString = $currentMonth . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                        $tasksForDay = $tasks->filter(function ($task) use ($dateString) {
                            return $task->fecha->toDateString() === $dateString;
                        });
                    @endphp
                    <td
                        class="border-slate-500 {{ $j < 6 ? 'border-r' : '' }} {{ $i < 4 ? 'border-b' : '' }}
                              p-2 max-w-36 max-h-32 w-36 h-32">
                        <a href="{{route('tasks.day', ['date' => $dateString])}}">
                        <div class="relative flex flex-col items-end w-full h-full gap-2">
                            @if ($day == Carbon::now()->format('d'))
                                <div class="font-semibold bg-gray-300 text-slate-800 rounded px-0.5">
                                    {{ $day }}</div>
                                <div class="mt-auto w-full flex flex-wrap justify-start gap-1">
                                    @foreach ($tasksForDay as $task)
                                        <div
                                            class="rounded w-full h-6 px-2 py-1 text-xs overflow-hidden overflow-ellipsis whitespace-nowrap {{ $task->etiqueta->color }}">
                                            {{ $task->tarea }}</div>
                                    @endforeach
                                </div>
                            @else
                                {{ $day }}
                                <div class="mt-auto w-full flex flex-wrap justify-start gap-1">
                                    @foreach ($tasksForDay as $task)
                                        <div
                                            class="rounded w-full h-6 px-2 py-1 text-xs overflow-hidden overflow-ellipsis whitespace-nowrap {{ $task->etiqueta->color }}">
                                            {{ $task->tarea }}</div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        </a>
                    </td>
                    @php
                        $day++;
                    @endphp
                @else
                    {{-- Empty cell for the previous month --}}
                    <td
                        class="border-slate-500 {{ $j < 6 ? 'border-r' : '' }} {{ $i < 4 ? 'border-b' : '' }}
                        p-2 max-w-36 max-h-32 w-36 h-32">
                    </td>
                @endif
            @endfor
        </tr>
    @endfor
</tbody>
</table>
