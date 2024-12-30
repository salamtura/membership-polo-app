<div class="common-card flex flex-col {{ $chukker != null ? 'gap-[10px]' : 'gap-6' }} h-full"
    style="border-left: 8px solid <?= $status === 'closed' ? '#C02930' : '#A3D131' ?>;">
    <div class="flex">
        <div class="flex-grow text-black font-[700] text-[24px]">
            <?= htmlspecialchars($title) ?>
        </div>
        <div><img src="{{ $icon }}" /></div>
    </div>
    <div class="text-[16px]"><?= htmlspecialchars($description) ?></div>
    <div class="flex items-center gap-[8px]">
        <div>Status:</div>
        <div class="<?= $status === 'closed' ? 'pill-danger' : 'pill-success' ?>">
            <?= htmlspecialchars($status) ?>
        </div>
    </div>
    <div class="flex font-[700] gap-[5px] items-center">
        <img src="/images/icons/stopwatch.svg" />
        <div style="color: <?= $status === 'closed' ? '#561216' : '#394911' ?>">
            <?= htmlspecialchars($date) ?></div>
    </div>
    @if ($chukker != null)
        @if ($chukker->status == 'open')
            @if ($booking == null)
                <button type="button" onclick="modalHandler(true)"
                    class="text-white w-full bg-green-900 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-3 mb-2 px-5 py-2 justify-center  text-center">Book
                    Now</button>
            @else
                <livewire:cancel-booking :booking="$booking" />
                {{--                                    <button type="button" wire:click="cancelBooking({{$booking->id}})" class="text-white w-full bg-red-900 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-5 px-5 py-2 justify-center  text-center">Cancel</button> --}}
            @endif
            <span class="ml-1 text-md  sm:text-lg font-normal text-black items-center gap-2">
                <b>Closes in:</b>
                <div class="wrap-countdown mercado-countdown"
                    data-expire="{{ Carbon\Carbon::parse($chukker->closing_time)->format('Y/m/d H:i:s') }}">
                </div>
            </span>
        @else
            @if ($booking != null)
                <button type="button" disabled
                    class="text-white w-full bg-{{ $booking->status == 'confirmed' ? 'green' : 'yellow' }}-500 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-5 px-5 py-2 justify-center  text-center">{{ \Illuminate\Support\Str::upper($booking->status) }}</button>
            @endif
        @endif
    @endif
</div>
