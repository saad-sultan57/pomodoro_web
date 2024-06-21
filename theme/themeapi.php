<?php
$items = [
    [
        'video_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718890739/rain-video_gcwyqb.mp4',
        'audio_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718886178/rain-sound_pk0i6f.mp3',
        'image_src' => 'https://res.cloudinary.com/dwmcc3lkr/image/upload/v1718890896/theme1_zrgcfc.png',
        'title' => 'Rain'
    ],
    [
        'video_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718907653/water_mj9qev.mp4',
        'audio_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718886180/water-audio_aubwwv.mp3',
        'image_src' => 'https://res.cloudinary.com/dwmcc3lkr/image/upload/v1718890897/theme2_vz4dta.png',
        'title' => 'Water'
    ],
    [
        'video_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718886285/fire_ep8n7c.mp4',
        'audio_src' => 'https://res.cloudinary.com/dwmcc3lkr/video/upload/v1718886176/fire-audio_viogsk.wav',
        'image_src' => 'https://res.cloudinary.com/dwmcc3lkr/image/upload/v1718890899/theme3_ldo6kj.jpg',
        'title' => 'FirePlace'
    ],
    
];


header('Content-Type: application/json');


echo json_encode($items);
?>
