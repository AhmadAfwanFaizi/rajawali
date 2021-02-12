<?php

$ci = &get_instance();

function login()
{
    $ci = &get_instance();
    if (!$ci->session->userdata('role')) {
        redirect('auth');
    }
}

function Admin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('role') !== "ADMIN") {
        redirect('auth');
    }
}

function A()
{
    $ci = &get_instance();
    if ($ci->session->userdata('role') == "B") {
        redirect('auth');
    }
}

function B()
{
    $ci = &get_instance();
    if ($ci->session->userdata('role') == "A") {
        redirect('auth');
    }
}

function segment($url)
{
    $ci = get_instance();
    $segment =  $ci->uri->segment($url);
    return $segment;
}

function waktu_sekarang()
{
    return date('Y-m-d H:i:s');
}

function menu($param, $param2)
{
    $ci = &get_instance();
    if ($ci->uri->segment(1) == $param && $ci->uri->segment(2) == $param2) {
        return 'class="active"';
    } else {
        return null;
    }
}

function notif($alert = null, $text = null)
{
    $ci = get_instance();

    switch ($alert) {
        case "D":
            $alert = "danger";
            break;
        case "I":
            $alert = "info";
            break;
        case "S":
            $alert = "success";
            break;
        case "W":
            $alert = "warning";
            break;
        default:
            $alert = "danger";
            break;
    }

    if ($alert) $text = $text;
    else $text = "Internal Server Error!";

    $data = [
        "alert" => $alert,
        "text"   => $text
    ];
    return $ci->session->set_flashdata($data);
}
