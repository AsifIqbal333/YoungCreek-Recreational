<?php

use App\Models\Product;

if (!function_exists('append_width_param')) {
    function append_width_param($url, $widthValue)
    {
        return $url;
        $parsedUrl = parse_url($url);

        // Parse existing query parameters if any
        $query = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $query);
        }

        // Add or replace 'width' parameter
        $query['width'] = $widthValue;

        // Rebuild query string
        $queryString = http_build_query($query);

        // Rebuild the full URL
        $finalUrl = (isset($parsedUrl['scheme']) ? "{$parsedUrl['scheme']}://" : '') .
            (isset($parsedUrl['host']) ? "{$parsedUrl['host']}" : '') .
            (isset($parsedUrl['port']) ? ":{$parsedUrl['port']}" : '') .
            (isset($parsedUrl['path']) ? "{$parsedUrl['path']}" : '') .
            '?' . $queryString .
            (isset($parsedUrl['fragment']) ? "#{$parsedUrl['fragment']}" : '');

        return $finalUrl;
    }
}

if (!function_exists('product_image')) {
    function product_image($category, $image, $width = 416)
    {
        // $cetgories = ['trash-receptacles', 'dog-course-kits', 'swing-belts-chains', 'toddler-bucket-seats'];

        // https://www.playtopiaplaygrounds.com/cdn/shop/files/ferguson-product-type-396303.jpg?v=1727262254&width=416
        // if (in_array($category, $cetgories) || !str_contains($image, "playtopiaplaygrounds.com")) {
        //     return append_width_param(asset($image), $width);
        // }


        if (str($image)->startsWith('http')) {
            return append_width_param($image, $width);
        }

        return append_width_param(asset($image), $width);
    }
}

if (!function_exists('generate_srcset')) {
    function generate_srcset(string $url)
    {
        $widths = [375, 550, 750, 1100, 1500, 1780, 2000, 3000, 3840];
        $srcsetParts = [];

        // Parse the URL
        $parsedUrl = parse_url($url);

        // Remove width param if it exists
        $queryParams = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            unset($queryParams['width']);
        }

        // Rebuild base URL without width
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];
        $cleanQuery = http_build_query($queryParams);
        $baseUrlWithQuery = $cleanQuery ? "{$baseUrl}?{$cleanQuery}" : $baseUrl;

        foreach ($widths as $width) {
            $separator = str_contains($baseUrlWithQuery, '?') ? '&' : '?';
            $urlWithWidth = "{$baseUrlWithQuery}{$separator}width={$width}";

            // Strip scheme (http or https)
            $urlWithoutScheme = preg_replace('/^https?:/', '', $urlWithWidth);
            $srcsetParts[] = "{$urlWithoutScheme} {$width}w";
        }

        return implode(', ', $srcsetParts);
    }
}

if (!function_exists('image_srcset')) {
    function image_srcset($category, $image)
    {
        // $cetgories = ['trash-receptacles', 'dog-course-kits', 'swing-belts-chains', 'toddler-bucket-seats'];

        // // https://www.playtopiaplaygrounds.com/cdn/shop/files/ferguson-product-type-396303.jpg?v=1727262254&width=416
        // if (in_array($category, $cetgories) || !str_contains($image, "playtopiaplaygrounds.com")) {
        //     return generate_srcset(asset($image));
        // }

        if (str($image)->startsWith('http')) {
            return generate_srcset($image);
        }

        return generate_srcset(asset($image));

    }
}

if (!function_exists('find_product')) {
    function find_product($type, $category, $subCategory = null)
    {
        return Product::query()
            ->with(['images'])
            ->where('type', $type)
            ->where('category', $category)
            ->when($subCategory, fn($q) => $q->where('sub_category', $subCategory))
            ->first();
    }
}

if (!function_exists('border_required')) {
    function border_required($category)
    {
        return in_array($category, ['aps-plastic-playground-borders', 'rubber-timber']);
    }
}

if (!function_exists('name_alphabetic')) {
    function name_alphabetic($name)
    {
        return array_reduce(
            explode(' ', $name),
            function ($initials, $word) {
                return sprintf('%s%s', $initials, substr($word, 0, 1));
            },
            ''
        );
    }
}

if (!function_exists('random_colour')) {
    function random_colour()
    {
        $colours = ['primary', 'success', 'secondary', 'info', 'danger', 'dark'];

        $random_keys = array_rand($colours);

        return $colours[$random_keys];
    }
}

if (!function_exists('badge_colour')) {
    function badge_colour($status)
    {
        if ($status === 'verified') {
            return 'badge-success';
        } elseif ($status === 'rejected') {
            return 'badge-danger';
        } else {
            return 'badge-primary';
        }
    }
}

if (!function_exists('discount_percentage')) {
    function discount_percentage()
    {
        return 10;
    }
}
