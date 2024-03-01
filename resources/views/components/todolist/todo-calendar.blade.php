<div class="grid grid-cols-3 place-self-end">
    <x-todolist.icon.todo-prev-month />
    <div
        class="py-1 px-2 border-white/50 border-y font-mono font-bold uppercase flex items-center justify-center text-xl bg-blue-500/50">
        @lang('calendar.' . Carbon\Carbon::parse($currentMonth)->format('M'))</div>
    <x-todolist.icon.todo-next-month />
</div>

<table class="w-full mt-6">
    <thead>
        <tr class="px-4 py-2 text-left bg-emerald-500/25 rounded-t">
            <th class="border-slate-500 border-r border-b rounded-tl px-4 py-2 text-left">@lang('calendar.mon')</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">@lang('calendar.tue')</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">@lang('calendar.wed')</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">@lang('calendar.thu')</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">@lang('calendar.fri')</th>
            <th class="border-slate-500 border-r border-b px-4 py-3 text-left">@lang('calendar.sat')</th>
            <th class="border-slate-500 border-b rounded-tr px-4 py-3 text-left">@lang('calendar.sun')</th>
        </tr>
    </thead>
    <tbody>
        @php
            use Carbon\Carbon;
            $day = 1;
            $daysOffset = $firstDayOfMonth - 1;

            $previousMonth = Carbon::parse($currentMonth)->subMonth();
            $nextMonth = Carbon::parse($currentMonth)->addMonth();
            $daysInPreviousMonth = $previousMonth->daysInMonth;
            $firstDayOfNextMonth = 1;
        @endphp

        @for ($i = 0; $i < 6; $i++)
            @if ($day > $daysInMonth)
            @break
        @endif

        <tr>
            @for ($j = 0; $j < 7; $j++)
                @php
                    $tasksForDay = collect();
                @endphp
                @if ($day <= $daysInMonth && ($i > 0 || $j >= $daysOffset))
                    @php
                        $dateString = $currentMonth . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                        $tasksForDay = $tasks->filter(function ($task) use ($dateString) {
                            return $task->fecha->toDateString() === $dateString;
                        });
                    @endphp
                    <td
                        class="border-slate-500 {{ $j < 6 ? 'border-r' : '' }} {{ $i < 4 ? 'border-b' : '' }}
                            p-2 max-w-36 max-h-32 min-w-36 h-32 hover:bg-blue-500/50 ease-in-out duration-200">
                        <a href="{{ route('tasks.day', ['date' => $dateString]) }}">
                            <div class="relative flex flex-col items-end w-full h-full gap-2">
                                <div
                                    class="{{ Carbon::parse($dateString)->format('Y-m-d') == Carbon::now()->format('Y-m-d') ? 'font-semibold bg-gray-300 text-slate-800 rounded px-0.5' : '' }}">
                                    {{ $day }}
                                </div>
                                <div class="mt-auto w-full flex flex-wrap justify-start gap-1">
                                    @foreach ($tasksForDay as $task)
                                        <div
                                            class="flex items-center rounded w-full h-5 px-1.5 {{ $task->etiqueta->color }}">
                                            <div class="text-xs truncate">
                                                {{ $task->tarea }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </td>
                    @php
                        $day++;
                    @endphp
                @else
                    @if ($i == 0 && $j < $daysOffset)
                        {{-- Cell for the previous month --}}
                        @php
                            $dateString =
                                $previousMonth->format('Y-m') .
                                '-' .
                                str_pad($daysInPreviousMonth - $daysOffset + $j + 1, 2, '0', STR_PAD_LEFT);
                            $tasksForDay = $tasks->filter(function ($task) use ($dateString) {
                                return $task->fecha->toDateString() === $dateString;
                            });
                        @endphp
                        <td
                            class="border-slate-500 {{ $j < 6 ? 'border-r' : '' }} {{ $i < 4 ? 'border-b' : '' }}
                            p-2 max-w-36 max-h-32 w-36 h-32 hover:bg-blue-500/25 ease-in-out duration-200">
                            <a href="{{ route('tasks.day', ['date' => $dateString]) }}">
                                <div class="relative flex flex-col items-end w-full h-full gap-2">
                                    <div
                                        class=" text-zinc-400 relative flex flex-col items-end w-full h-full gap-2">
                                        <div
                                            class="{{ Carbon::parse($dateString)->format('Y-m-d') == Carbon::now()->format('Y-m-d') ? 'font-semibold bg-gray-300 text-slate-800 rounded px-0.5' : '' }}">
                                            {{ $daysInPreviousMonth - $daysOffset + $j + 1 }}
                                        </div>
                                    </div>
                                    <div class="mt-auto w-full flex flex-wrap justify-start gap-1">
                                        @foreach ($tasksForDay as $task)
                                            <div
                                                class="flex items-center rounded w-full h-5 px-1.5 {{ $task->etiqueta->color }}">
                                                <div class="text-xs truncate">
                                                    {{ $task->tarea }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </td>
                    @else
                        @php
                            $dateString =
                                $nextMonth->format('Y-m') . '-' . str_pad($firstDayOfNextMonth, 2, '0', STR_PAD_LEFT);
                            $tasksForDay = $tasks->filter(function ($task) use ($dateString) {
                                return $task->fecha->toDateString() === $dateString;
                            });
                            $firstDayOfNextMonth++;
                        @endphp
                        {{-- Cell for the next month --}}
                        <td
                            class="border-slate-500 {{ $j < 6 ? 'border-r' : '' }} {{ $i < 4 ? 'border-b' : '' }}
                            p-2 max-w-36 max-h-32 min-w-36 h-32 hover:bg-blue-500/25 ease-in-out duration-200">
                            <a href="{{ route('tasks.day', ['date' => $dateString]) }}">
                                <div class="relative flex flex-col items-end w-full h-full gap-2">
                                    <div
                                        class=" text-zinc-400 relative flex flex-col items-end w-full h-full gap-2">
                                        <div
                                            class="{{ Carbon::parse($dateString)->format('Y-m-d') == Carbon::now()->format('Y-m-d') ? 'font-semibold bg-gray-500 text-slate-800 rounded px-0.5' : '' }}">
                                            {{ $firstDayOfNextMonth - 1 }}
                                        </div>
                                    </div>
                                    <div class="mt-auto w-full flex flex-wrap justify-start gap-1">
                                        @foreach ($tasksForDay as $task)
                                            <div
                                                class="flex items-center rounded w-full h-5 px-1.5 {{ $task->etiqueta->color }}">
                                                <div class="text-xs truncate">
                                                    {{ $task->tarea }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </td>
                    @endif
                @endif
            @endfor
        </tr>
    @endfor
</tbody>
</table>
