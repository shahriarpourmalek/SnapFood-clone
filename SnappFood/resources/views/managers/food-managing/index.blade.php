@extends('layouts.managers-layout.main')


@section('content')
    <a class="flex flex-row justify-center" href="{{route('managers.food-managing.create')}}">
        <div
            class="text-2xl font-bold flex flex-row justify-center h-20 w-[350px] bg-orange-500 text-gray-200 rounded-lg pt-5">
            add Food
        </div>
    </a>


    <section class="bg-[#F3F4F6] pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap">
                @foreach($foods as $food)
                    <div class="w-full px-4 md:w-15 xl:w-1/3">
                        <div class="mb-10 overflow-hidden rounded-lg bg-white">

                            <img
                                src="{{asset("images/foods-image/$food->image")}}"
                                alt="image"

                                class="w-full h-[200px]"
                            />
                            <div class="flex flex-row justify-between mx-4 mt-6">
                                <p class="text-body-color text-xl mb-7 text-base leading-relaxed">
                                    price: {{$food->price}}T
                                </p>
                                @if($food->discount_id)
                                    @if($discount->find($food->discount_id))
                                    <div class="w-20 h-10 bg-amber-500 rounded-full text-white text-2xl text-center">{{$discount->find($food->discount_id)->amount}}%</div>
                                    @endif
                                @endif
                            </div>
                            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                                <h3>
                                    <a href=""
                                       class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                                        {{$food->name}}
                                    </a>
                                </h3>
                                <p class="text-body-color mb-7 text-base leading-relaxed">
                                    {{$food->raw_material}}
                                </p>
                                <div class="flex flex-row  justify-between">
                                    <a href="{{route('managers.food-managing.edit',$food->id)}}"
                                       class="text-body-color bg-yellow-300 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                        edit details
                                    </a>
                                    <form action="{{route('managers.food-managing.delete',$food->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-gray-300 bg-red-400 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                            Delete Food
                                        </button>
                                    </form>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <a href="javascript:void(0)"
                                       class="text-body-color bg-blue-400 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                        add to food party
                                    </a>
                                    <a href="{{route('managers.food-managing.add-discount',$food->id)}}"
                                       class="text-body-color bg-green-500 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                        add discount
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
