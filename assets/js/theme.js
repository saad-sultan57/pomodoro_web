document.addEventListener("DOMContentLoaded", function() {
    const itemsContainer = document.querySelector('.owl-carousel'); 
    const clock1=document.querySelector(".btn-timer");

    // Function to create an item HTML structure
    function createItemHTML(item) {
        return `
            <div class="item cursor" data-src="${item.video_src}" data-audio="${item.audio_src}">
                <div class="theme-main">
                    <img src="${item.image_src}" alt="${item.title}" srcset="">
                    <h3 class="text-light theme-h1">${item.title}</h3>
                </div>
            </div>
        `;
    }

    // Fetch data from the API
    fetch('theme/themeapi.php')
        .then(response => response.json())
        .then(data => {
            // Iterate through each item and append to the carousel
            data.forEach(item => {
                const itemHTML = createItemHTML(item);
                itemsContainer.insertAdjacentHTML("afterbegin", itemHTML);
            });
        
            // Initialize the carousel once items are added
            $(document).ready(function(){
                $(".image-slider1").owlCarousel({
                    margin: 10,
                    loop: true,
                    dots: false,
                    nav: true,
                    navText: ["<", ">"],
                    responsive: {
                        0: { items: 1 },
                        600: { items: 2 },
                        1000: { items: 3 },
                        1200: { items: 3 }
                    }
                });
            });

            // Get all elements with class name 'item' after they are added
            const items = document.querySelectorAll('.item');
            // Get the video and audio elements
            const videoMain = document.querySelector('#clock-section video');
            const audioPlayer = document.getElementById('audio-player');
            const audioToggle = document.getElementById('audio-toggle');
            const volumeIcon = document.getElementById('volume');
            const themeDesc = document.getElementById('theme-desc');
            const clock_theme_name = document.getElementById('clock-theme-name');

            // Set the audio to be muted initially
            audioPlayer.muted = true;
            audioToggle.textContent = 'Audio Disabled';

            // Function to set and play the video and audio
            function setAndPlayMedia(videoSrc, audioSrc) {
                videoMain.setAttribute('src', videoSrc);
                videoMain.load();
                videoMain.play().catch(error => console.error('Video play error:', error));

                audioPlayer.setAttribute('src', audioSrc);
                audioPlayer.load();
                if (!audioPlayer.muted) {
                    audioPlayer.play().catch(error => console.error('Audio play error:', error));
                }
            }

            // Check if there's a saved video source in local storage
            const savedVideoSrc = localStorage.getItem('videoSrc');
            const savedAudioSrc = localStorage.getItem('audioSrc');

            if (savedVideoSrc && savedAudioSrc) {
                // If there is a saved video and audio source, set and play them
                setAndPlayMedia(savedVideoSrc, savedAudioSrc);
            } else {
                // If no video is saved, play the first video's source from the list
                const firstItem = items[0];
                if (firstItem) {
                    const firstVideoSrc = firstItem.getAttribute('data-src');
                    const firstAudioSrc = firstItem.getAttribute('data-audio');
                    setAndPlayMedia(firstVideoSrc, firstAudioSrc);
                    localStorage.setItem('videoSrc', firstVideoSrc); // Save the first video source
                    localStorage.setItem('audioSrc', firstAudioSrc); // Save the first audio source
                }
            }

            // Add click event listener to each item
            items.forEach(item => {
                item.addEventListener('click', function() {
                    // Get the value of data-src and data-audio attributes of the clicked item
                    const videoSrc = item.getAttribute('data-src');
                    const audioSrc = item.getAttribute('data-audio');
                    const title = item.querySelector('.theme-h1').innerText; // Get the title of the clicked item

                    // Set and play the video and audio
                    setAndPlayMedia(videoSrc, audioSrc);

                    // Save the current video and audio source in local storage
                    localStorage.setItem('videoSrc', videoSrc);
                    localStorage.setItem('audioSrc', audioSrc);

                    // Update the theme title
                    themeDesc.innerText = title;
                    clock_theme_name.innerText = title;
                });
            });

            // Add click event listener to the audio toggle button
            volumeIcon.addEventListener('click', function() {
                audioPlayer.muted = !audioPlayer.muted;
                audioToggle.textContent = audioPlayer.muted ? 'Audio Disabled' : 'Audio Enabled';
                if (audioPlayer.muted) {
                    volumeIcon.classList.remove('fa-volume-high');
                    volumeIcon.classList.add('fa-volume-mute');
                } else {
                    volumeIcon.classList.remove('fa-volume-mute');
                    volumeIcon.classList.add('fa-volume-high');

                    // Get the current audio source from local storage or the initial one
                    const currentAudioSrc = localStorage.getItem('audioSrc') || savedAudioSrc;
                    audioPlayer.setAttribute('src', currentAudioSrc);
                    audioPlayer.load();
                    audioPlayer.play().catch(error => console.error('Audio play error:', error));
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));


        // Show Clocks
        clock1.addEventListener("click",function(){
            const currentText = clock1.innerText;
            clock1.innerText = currentText === "Show Full Clock" ? previousText : "Show Full Clock";
            previousText = currentText;

            document.querySelector(".clock-main-2").classList.toggle("d-none");
            document.querySelector(".watch-time").classList.toggle("d-none");
            document.querySelector("#simple-clock").classList.toggle("d-none");
        })
        
});
