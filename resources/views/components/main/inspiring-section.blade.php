@props(["textFlexOrder", "heading", "slot", "imagePath"])
<section data-aos="fade-right" data-aos-duration="1000" class="mt-8 scroll-mt" {{ $attributes }}>
        <div class="container mx-auto lg:flex gap-8">
            <!-- Text -->
            <div class="p-4 flex-1 self-center {{ $textFlexOrder }}">
                <div class="max-w-lg text-justify mx-auto text-dark">
                    <h2 class="section-heading text-center">{{ $heading }}</h2>
                    <p class="section-paragraph">
                        {{ $slot }}
                    </p>
                </div>
            </div>
            <!-- Image -->
            <div class="flex-1 mt-4 lg:mt-0">
                <img src="{{ $imagePath }}" alt="" width="1482" height="981" class="object-cover w-full h-full" />
            </div>
        </div>
</section>
