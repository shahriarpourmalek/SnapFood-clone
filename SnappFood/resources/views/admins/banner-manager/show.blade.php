@extends('layouts.admin-layout.main')



@section('content')
    <h2 class="text-black text-[30px] flex flex-row justify-center mb-10">Banner Manager</h2>

    <section class="bg-[#F3F4F6] pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4 md:w-15 xl:w-1/3">
                        <div class="mb-10 overflow-hidden rounded-lg bg-white">

                            <img
                                src="{{asset("images/banner-images/$banner->banner_img")}}"
                                alt="image"

                                class="w-full h-[200px]"
                            />
                            <div class="flex flex-col ">
                                <div class="pt-3 flex flex-row justify-center gap-4">
                                    <h3>banner title : {{$banner->title}}</h3>
                                    <h3>expires at  : {{$banner->expires_at}}</h3>

                                </div>
                            </div>
                            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">


                                <div class="flex flex-row  justify-between">
                                    <a href="{{route('admin.banner-manager.edit',$banner->id)}}"
                                       class="text-body-color bg-yellow-300 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                        edit details
                                    </a>
                                    <form action="{{route('admin.banner-manager.delete',$banner->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-gray-300 bg-red-400 hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 w-[150px] text-base font-medium transition hover:text-white">
                                            Delete  Banner
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
