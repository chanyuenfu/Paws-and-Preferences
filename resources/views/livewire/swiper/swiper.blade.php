<div class="m-auto md:p-10 w-full h-full relative">

    <div class="relative h-full md:h-[600px] w-full md:w-96 m-auto">

        <!-- Swiper Card -->

        @if (count($cats) > 0)
            @foreach ($cats as $index => $cat)
                <div 
                wire:key="cat-{{ $cat['id'] }}"
                wire:ignore
                x-data="{
                    isSwiping: false,
                    swipingRight: false,
                    swipingLeft: false,
                    like() { this.forceSwipe(1) },
                    dislike() { this.forceSwipe(0) },
                    forceSwipe(liked) {
                        let toX = liked ? window.innerWidth : -window.innerWidth;
                        this.$el.style.transition = 'transform 0.5s ease';
                        this.$refs.card.style.transform = `translate(${toX}px, 100px) rotate(${liked ? 30 : -30}deg)`;
                        setTimeout(() => {
                            @this.call('swipe', '{{ $cat['id'] }}', liked);
                        }, 300);
                    }
                }" 
                
                x-init="
                
                let element = $el;
                
                {{-- Init hammer.js --}}
                let hammertime = new Hammer(element);
                
                {{-- Let pan support all directions --}}
                hammertime.get('pan').set({ direction: Hammer.DIRECTION_ALL });
                
                {{-- Store reference so we can destroy it later --}}
                $el.__hammer = hammertime;

                {{-- On pan --}}
                hammertime.on('pan', (event) => {
                    isSwiping = true;
                
                    {{-- Swipe Right --}}
                    if (event.deltaX > 20) {
                        swipingRight = true;
                        swipingLeft = false;
                    }
                
                    {{-- Swipe Left --}}
                    else if (event.deltaX < -20) {
                        swipingLeft = true;
                        swipingRight = false;
                    }
                
                    {{-- Rotate --}}
                    rotate = event.deltaX / 10;
                    element.style.transform = `translate(${event.deltaX}px, ${event.deltaY}px) rotate(${rotate}deg)`;
                });
                
                hammertime.on('panend', (event) => {
                
                    {{-- Reset if swipe is not strong enough --}}
                    if (Math.abs(event.deltaX) < 120) {
                        element.style.transition = 'transform 0.3s ease';
                        element.style.transform = 'translate(0,0) rotate(0deg)';
                        setTimeout(() => { element.style.transition = ''; }, 300);
                    } else {
                        {{-- Swipe out --}}
                        let liked = event.deltaX > 0 ? 1 : 0;
                        let toX = event.deltaX > 0 ? window.innerWidth : -window.innerWidth;
                        element.style.transition = 'transform 0.5s ease';
                        element.style.transform = `translate(${toX}px, ${event.deltaY}px) rotate(${event.deltaX/10}deg)`;
                
                        setTimeout(() => {
                            @this.call('swipe', '{{ $cat['id'] }}', liked);
                        }, 300);
                    }
                });"
                :class="{ 'transform-none cursor-grab': isSwiping }"
                    class="absolute inset-0 m-auto z-[{{ count($cats) - $index }}]">

                    <div class="h-full w-full transform transition-all duration-300 rounded-xl bg-gray-500"
                        x-ref="card">

                        <div class="relative overflow-hidden w-full h-full rounded-xl bg-cover"
                            style="background-image: url('{{ $cat['image'] }}'); background-position:center;">

                            <!-- Swiper Indicators -->
                            <div class="pointer-events-none">
                                <span x-cloak :class="{ 'invisible': !swipingRight }"
                                    class="border-2 rounded-md p-1 px-2 border-green-500 text-green-500 text-4xl capitalize font-extrabold top-10 right-5 rotate-12 absolute z-5">
                                    LIKE
                                </span>
                                <span x-cloak :class="{ 'invisible': !swipingLeft }"
                                    class="border-2 rounded-md p-1 px-2 border-red-500 text-red-500 text-4xl capitalize font-extrabold top-10 left-5 -rotate-12 absolute z-5">
                                    NOPE
                                </span>
                            </div>

                            <!-- Info and Actions -->
                            <section
                                class="absolute inset-x-0 bottom-0 inset-y-1/2 py-2 bg-gradient-to-t from-black to-black/0 pointer-events-none">
                                <div class="flex flex-col h-full gap-2.5 mt-auto p-5 text-white">

                                    <!-- Cat Details -->
                                    <div class="grid grid-cols-10 items-center">
                                        <div class="col-span-10">
                                            <h4 class="font-bold text-3xl">
                                                {{ $cat['name'] }}
                                            </h4>
                                            <p class="text-lg line-clamp-3">
                                                {{ $cat['desc'] }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="grid grid-cols-2 gap-4 mt-auto pointer-events-auto">

                                        <!-- Dislike Button-->
                                        <div>
                                            <button @click="dislike()" draggable="false"
                                                class="rounded-full border-2 pointer-events-auto group border-red-600 p-2 shrink-0 max-w-fit flex items-center text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" stroke-width="3" stroke="currentColor"
                                                    class="w-10 h-10 shrink-0 m-auto group-hover：scale-105 transition-transform">
                                                    <path fill-rule="evenodd"
                                                        d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Like Button-->
                                        <div>
                                            <button @click="like()" draggable="false"
                                                class="rounded-full border-2 pointer-events-auto group border-green-600 p-2 shrink-0 max-w-fit flex items-center text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" stroke-width="3" stroke="currentColor"
                                                    class="w-10 h-10 shrink-0 m-auto group-hover：scale-105 transition-transform">
                                                    <path
                                                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            {{-- End screen with reload --}}
            <div class="w-full text-center space-y-6">
                <h2 class="text-2xl font-bold">You liked {{ count($liked) }} cats 😺</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($liked as $cat)
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="{{ $cat['image'] }}" alt="Liked Cat" class="w-full h-40 object-cover">
                            <div class="p-2 text-sm text-gray-700">
                                <strong>{{ $cat['name'] }}</strong>
                                <p class="text-xs">{{ $cat['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button wire:click="reloadCats"
                    class="mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Try Again?
                </button>
            </div>
        @endif
    </div>

</div>
