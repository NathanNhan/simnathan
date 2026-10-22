<?php
function get_tour_weather($lat, $lng)
{
    $transient_key = 'tour_weather_' . md5($lat . $lng);
    $weather_data = get_transient($transient_key);

    if (false === $weather_data) {
        $api_url = sprintf('https://api.open-meteo.com/v1/forecast?latitude=%s&longitude=%s&daily=temperature_2m_max,temperature_2m_min,weathercode&timezone=auto', $lat, $lng);
        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $weather_data = json_decode($body, true);

        // Lưu cache trong 2 giờ
        set_transient($transient_key, $weather_data, 2 * HOUR_IN_SECONDS);
    }

    return $weather_data;
}
