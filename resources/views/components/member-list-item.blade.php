<div class="flex w-auto items-center">
    <div class="flex flex-grow min-w-[300px] gap-[10px] items-center">
        <div class="polo-member-pic" style="background-image: url('{{ $image }}')"></div>
        <div>
            <div style="color: #18181B; font-size: 14px; font-weight: 700; text-wrap: nowrap">{{ $name }}</div>
            <div style="color: #71717A; font-size: 13px; font-weight: 400; text-wrap: nowrap">{{ $email }}</div>
        </div>
    </div>
    <div class="flex w-[100px] mt-[-20px]"
        style="color: {{-- #908E8F --}}#374140; font-size: {{-- 13px --}}16px; font-weight: 500; text-wrap-mode: nowrap">
        Handicap:
        {{ $points }}</div>
    {{-- <div style="color: #374140; font-size: 14px; font-weight: 500">View</div> --}}
</div>
