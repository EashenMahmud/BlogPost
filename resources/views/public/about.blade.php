@extends('layouts.public')

@section('content')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideRight {
        from {
            transform: translateX(-20px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideLeft {
        from {
            transform: translateX(20px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }

    .animate-slide-up {
        animation: slideUp 1s ease-out forwards;
    }

    .animate-slide-right {
        animation: slideRight 1s ease-out forwards;
    }

    .animate-slide-left {
        animation: slideLeft 1s ease-out forwards;
    }
</style>
<!-- Hero Section -->
<section class="relative bg-cover bg-center h-[60vh] md:h-[80vh] flex items-center justify-center"
    style="background-image: url('https://picsum.photos/1200/800?random=3');">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-60"></div> <!-- Overlay -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">About Us</h1>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-slide-up">
            We are dedicated to providing insightful articles, resources, and support to help our readers grow
            in their educational journey. Learn more about who we are, our mission, and our vision for the
            future.
        </p>
    </div>
</section>
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <!-- Mission and Vision Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div class="space-y-4 animate-slide-right">
                <h2 class="text-3xl font-bold text-gray-800">Our Mission</h2>
                <p class="text-gray-600 text-lg">
                    Our mission is to empower individuals through accessible, high-quality educational content. We
                    believe that knowledge should be free and available to everyone, and we strive to create a platform
                    where readers can expand their horizons.
                </p>
            </div>
            <div class="space-y-4 animate-slide-left">
                <h2 class="text-3xl font-bold text-gray-800">Our Vision</h2>
                <p class="text-gray-600 text-lg">
                    We envision a world where education is within reach for everyone, regardless of background or
                    circumstance. By sharing knowledge, we aim to foster a community that values learning and personal
                    growth.
                </p>
            </div>
        </div>

        <!-- Image and Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <img src="https://picsum.photos/600/400?random=1" alt="Team working together"
                class="rounded-lg shadow-lg w-full h-72 object-cover animate-fade-in">
            <div class="space-y-4 animate-slide-up">
                <h2 class="text-3xl font-bold text-gray-800">Who We Are</h2>
                <p class="text-gray-600 text-lg">
                    We are a team of passionate individuals from diverse backgrounds, united by our love for education
                    and our desire to make a difference. Our team includes writers, educators, and industry experts who
                    contribute to making our platform a valuable resource.
                </p>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-gray-800 mb-12 animate-fade-in">Our Core Values</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Integrity</h3>
                    <p class="text-gray-600">
                        We uphold the highest standards of integrity in everything we do, ensuring that our content is
                        honest, reliable, and trustworthy.
                    </p>
                </div>
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Innovation</h3>
                    <p class="text-gray-600">
                        We are always exploring new ways to present information and make learning exciting, engaging,
                        and accessible for all.
                    </p>
                </div>
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Community</h3>
                    <p class="text-gray-600">
                        Our community is at the heart of everything we do. We aim to create a welcoming space where
                        knowledge and ideas can flourish.
                    </p>
                </div>
            </div>
        </div>

        <!-- Team Image Section -->
        <div class="text-center mb-16">
            <img src="https://picsum.photos/800/400?random=2" alt="Our team"
                class="rounded-lg shadow-lg w-full h-72 object-cover mx-auto animate-fade-in">
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto animate-slide-up">
                Our team is dedicated to creating a positive impact through education. Together, we’re building a
                platform that helps people grow, connect, and achieve their dreams.
            </p>
        </div>
    </div>
</section>

<!-- CSS for animations -->
<section class="h-[920px] bg-[#FFFFFF]">
    <div class="custom-container grid grid-cols-3 gap-8 px-0 items-center">
        <!-- Left Side - Titles -->
        <div class="col-span-1 flex flex-col justify-start items-start space-y-6 mt-40">
            @foreach($sections as $index => $section)
                <h2
                    class="tab-link font-bold text-[#7A7A7A] text-[40px] cursor-pointer"
                    onclick="showTabContent({{ $index }}, this)"
                >
                    <span class="first">{{ $section->title_first }}</span>
                    <span class="second text-[#7A7A7A]">{{ $section->title_second }}</span>
                </h2>
            @endforeach
        </div>

        <!-- Right Side - Content Box (Carousel) -->
        <div class="col-span-2 relative w-full flex justify-end items-end">
            <div class="carousel relative w-full flex flex-col items-end justify-end space-y-4">
                @foreach($sections as $index => $section)
                    <div
                        id="section-{{ $index }}"
                        class="tab-content w-full transform transition-all duration-500 absolute top-1/2 @if($index !== 0) hidden @endif"
                    >
                        <div class="inner-content relative p-8 rounded-lg">
                            <img
                                src="{{ asset('storage/' . $section->icon) }}"
                                alt="decorative icon"
                                class="absolute top-6 left-8 w-10 h-10 transform -translate-x-2 -translate-y-2"
                            />

                            <p class="text-[#000000] text-[18px] leading-8 font-light text-start px-8">
                                {{ $section->content }}
                            </p>

                            <img
                                src="{{ asset('storage/' . $section->icon) }}"
                                alt="decorative icon"
                                class="absolute bottom-8 right-8 w-10 h-10 transform translate-x-2 translate-y-2"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    const contents = document.querySelectorAll('.tab-content');
    const totalContents = contents.length;

    function showTabContent(index, element) {
        document.querySelectorAll('.tab-link').forEach(function (tab) {
            tab.classList.remove('text-[48px]', 'text-[#1D3AA5]');
            tab.classList.add('text-[40px]', 'text-[#7A7A7A]');
            tab.querySelector('.second')?.classList.remove('text-[#1D3AA5]');
            tab.querySelector('.second')?.classList.add('text-[#7A7A7A]');
            tab.querySelector('.first')?.classList.remove('text-[#000000]');
            tab.querySelector('.first')?.classList.add('text-[#7A7A7A]');
        });

        element.classList.remove('text-[#7A7A7A]', 'text-[40px]');
        element.classList.add('text-[#1D3AA5]', 'text-[48px]');
        element.querySelector('.second')?.classList.remove('text-[#7A7A7A]');
        element.querySelector('.second')?.classList.add('text-[#1D3AA5]');
        element.querySelector('.first')?.classList.remove('text-[#7A7A7A]');
        element.querySelector('.first')?.classList.add('text-[#000000]');

        contents.forEach((content) => {
            content.style.transform = "translateY(0) scale(1)";
            content.classList.add('hidden');
            content.style.zIndex = "1"; // Reset z-index for all contents
            const innerContent = content.querySelector('.inner-content');
            innerContent.classList.remove(
                'border-b-8',
                'border-blue-600',
                'border-red-600',
                'border-green-600',
                'border-yellow-600',
                'bg-white',
                'font-medium'
            );
            innerContent.style.boxShadow = '';
            content.querySelector('p').classList.remove('font-medium');
        });

        let borderColorClass = '';
        if (index === 0) {
            borderColorClass = 'border-blue-600';
        } else if (index === 1) {
            borderColorClass = 'border-red-600';
        } else if (index === 2) {
            borderColorClass = 'border-green-600';
        } else if (index === 3) {
            borderColorClass = 'border-yellow-600';
        }

        const currentContent = contents[index];
        currentContent.style.transform = "translateY(0) scale(1.1)";
        currentContent.classList.remove('hidden');
        currentContent.style.zIndex = "10"; // Add z-index for the active content

        const innerContent = currentContent.querySelector('.inner-content');
        innerContent.classList.add('border-b-8', borderColorClass, 'bg-white');
        innerContent.style.boxShadow = '0px 20px 30px 0px #00000033';
        currentContent.querySelector('p').classList.add('font-normal');

        const prevIndex = (index - 1 + totalContents) % totalContents;
        const nextIndex = (index + 1) % totalContents;

        contents[prevIndex].style.transform = "translateY(-150px) scale(0.9)";
        contents[prevIndex].classList.remove('hidden');

        contents[nextIndex].style.transform = "translateY(150px) scale(0.9)";
        contents[nextIndex].classList.remove('hidden');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const firstTab = document.querySelector('.tab-link');
        if (firstTab) {
            showTabContent(0, firstTab);
        }
    });
</script>
@endsection