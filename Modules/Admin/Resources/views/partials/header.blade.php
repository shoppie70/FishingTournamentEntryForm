{{--@php--}}
{{--    use App\Models\Reservation;--}}
{{--    use App\Models\MenuPrice;--}}
{{--    use App\Models\ReservationPlace;--}}

{{--    $menu_unit_price = MenuPrice::getMenuPrice();--}}
{{--    $today_reservations = Reservation::getNumberOfTodayReservation();--}}
{{--    $tomorrow_sales = Reservation::getNumberOfTomorrowReservation();--}}
{{--    $reservation_places = ReservationPlace::all();--}}
{{--@endphp--}}
{{--<div class="relative bg-green-500 md:pt-32 pb-32 pt-12">--}}
{{--    <div class="px-4 md:px-10 mx-auto w-full">--}}
{{--        <div>--}}
{{--            <div class="flex flex-wrap">--}}
{{--                <div class="w-full lg:w-6/12 xl:w-4/12 px-4">--}}
{{--                    <div class="bg-white rounded">--}}
{{--                        <h5 class="bg-green-50 p-4 font-bold text-base border-b">--}}
{{--                            本日({{ date('Y年n月j日') }})の予約数--}}
{{--                        </h5>--}}
{{--                        <div class="p-4 mb-2">--}}
{{--                            @foreach($reservation_places as $reservation_place)--}}
{{--                                @php--}}
{{--                                    $today_sales = Reservation::getNumberOfTodayReservation($reservation_place->id);--}}
{{--                                @endphp--}}
{{--                                <dl class="border-b py-1 flex justify-between">--}}
{{--                                    <dt>--}}
{{--                                        {{ $reservation_place->name }}--}}
{{--                                    </dt>--}}
{{--                                    <dd>--}}
{{--                                        <span class="text-black text-xl">{{ $today_sales }}食</span>--}}
{{--                                        （{{ number_format($today_sales * $menu_unit_price) }}円）--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                            @endforeach--}}
{{--                            <dl class="border-b py-1 flex justify-between">--}}
{{--                                <dt>--}}
{{--                                    合計提供食数--}}
{{--                                </dt>--}}
{{--                                <dd>--}}
{{--                                    <span class="text-xl">--}}
{{--                                        {{ number_format( $today_reservations ) }}食--}}
{{--                                    </span>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                            <dl class="border-b py-1 flex justify-between">--}}
{{--                                <dt>--}}
{{--                                    合計売上金額--}}
{{--                                </dt>--}}
{{--                                <dd>--}}
{{--                                    <span class="text-xl">--}}
{{--                                        {{ number_format( $today_reservations * $menu_unit_price ) }}円--}}
{{--                                    </span>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full lg:w-6/12 xl:w-4/12 px-4">--}}
{{--                    <div class="bg-white rounded">--}}
{{--                        <h5 class="p-4 font-bold text-blueGray-400 text-base border-b">--}}
{{--                            明日({{ date('Y年n月j日', strtotime('tomorrow')) }})の予約数--}}
{{--                        </h5>--}}
{{--                        <div class="p-4 mb-2">--}}
{{--                            @foreach($reservation_places as $reservation_place)--}}
{{--                                @php--}}
{{--                                    $tommorrow_sales = Reservation::getNumberOfTomorrowReservation($reservation_place->id);--}}
{{--                                @endphp--}}
{{--                                <dl class="border-b py-1 flex justify-between">--}}
{{--                                    <dt>--}}
{{--                                        {{ $reservation_place->name }}--}}
{{--                                    </dt>--}}
{{--                                    <dd>--}}
{{--                                        <span class="text-black text-xl">{{ $tommorrow_sales }}食</span>--}}
{{--                                        （{{ number_format($tommorrow_sales * $menu_unit_price) }}円）--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                            @endforeach--}}
{{--                            <dl class="border-b py-1 flex justify-between">--}}
{{--                                <dt>--}}
{{--                                    合計提供食数--}}
{{--                                </dt>--}}
{{--                                <dd>--}}
{{--                                    <span class="text-xl">--}}
{{--                                        {{ number_format( $tomorrow_sales ) }}食--}}
{{--                                    </span>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                            <dl class="border-b py-1 flex justify-between">--}}
{{--                                <dt>--}}
{{--                                    合計売上金額--}}
{{--                                </dt>--}}
{{--                                <dd>--}}
{{--                                    <span class="text-xl">--}}
{{--                                        {{ number_format( $tomorrow_sales * $menu_unit_price ) }}円--}}
{{--                                    </span>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
