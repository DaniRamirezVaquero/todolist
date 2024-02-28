<table class="w-full mt-8 bg-gray-700 rounded">
    <thead>
        <tr>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Mon</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Tue</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Wed</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Thu</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Fri</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Sat</th>
            <th class="border border-gray-700 px-4 py-2 text-left bg-emerald-500/25">Sun</th>
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
                        $taskForDay = $tasks->first(function ($task) use ($dateString) {
                            return $task->fecha->toDateString() === $dateString;
                        });
                    @endphp

                    <td class="border p-6">
                        @if ($day == Carbon::now()->format('d'))
                            <span class="font-bold">{{ $day }}</span>
                            @if ($taskForDay)
                                <span class="text-red-500">•</span>
                            @endif
                        @else
                            {{ $day }}
                            @if ($taskForDay)
                                <span class="text-red-500">•</span>
                            @endif
                        @endif
                    </td>

                    @php
                        $day++;
                    @endphp
                @else
                    {{-- Empty cell for the previous month --}}
                    <td class="border p-6"></td>
                @endif
            @endfor
        </tr>
    @endfor
</tbody>
</table>
