<?php
if (!defined('ABSPATH')) {
    exit;
}

$options = get_current_language_options();

$social_networks = array(
    'facebook_url'   => [
        "title" => 'Facebook',
        "icon" => 'icon-facebook.svg'
    ],
    'youtube_url'    => [
        "title" => 'YouTube',
        "icon" => 'icon-youtube.svg'
    ],
    'tiktok_url'     => [
        "title" => 'TikTok',
        "icon" => 'icon-tiktok.svg'
    ],
    'twitterx_url'   => [
        "title" => 'Twitter/X',
        "icon" => 'icon-twitter-x.svg'
    ],
    'instagram_url'  => [
        "title" => 'Instagram',
        "icon" => 'icon-instagram.svg'
    ],
    'linkedin_url'   => [
        "title" => 'LinkedIn',
        "icon" => 'icon-linkedin.svg'
    ],
);

$icon_dir = get_template_directory() . '/assets/icons/';
?>

<ul class="social-networks">
    <?php foreach ($social_networks as $field_key => $field_value) : ?>
        <?php
        $url = $options[$field_key] ?? '';
        $title = $field_value['title'];
        $icon_file = $field_value['icon'];
        ?>
        <?php if (!empty($url)) : ?>
            <li>
                <a href="<?= esc_url($url) ?>" target="_blank" rel="noopener noreferrer" aria-label="Visit our <?= esc_attr(ucwords(str_replace('_url', '', $field_key))) ?> page">
                    <?php
                    $icon_path = $icon_dir . $icon_file;
                    if (file_exists($icon_path)) {
                        include $icon_path;
                        echo "<span>$title</span>";
                    } else {
                        echo '<!-- Icon ' . esc_attr($icon_file) . ' not found -->';
                    }
                    ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>