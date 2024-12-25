<div class="flex items-center">
    <div class="w-full flex items-start mr-[20px]">
        <div class="flex-grow bg-[#A3D131] text-white text-[14px] p-[5px]">
            {{ $datelabel }}</div>
        <div class="bg-[#E2F1BF] text-[14px] font-[500] text-[#293130] p-[5px]">
            {{ $day }}</div>
    </div>
    <div class="w-[450px] flex flex-col gap-[8px] pl-[20px]" style="border-left: 6px solid #A3D131;">
        <div class="text-[#293130] text-[16px] font-[700]">{{ $title }}</div>
        <div class="text-[#374140] font-[400] text-[14px]">{{ $description }}</div>
        <div>
            <div class="flex items-center gap-[10px]">
                <div class="font-[400] text-[14px] text-[#667185]">{{ $players }} Players</div>
                <div class="pill-success">{{ $breakoutSessions }} Breakout Sessions</div>
            </div>
            <div class="flex items-center gap-[4px]">
                <img src="images/icons/clock.svg" />
                <div class="text-[#667185] text-[14px] font-[400]">{{ $time }}</div>
            </div>
        </div>
    </div>
</div>
