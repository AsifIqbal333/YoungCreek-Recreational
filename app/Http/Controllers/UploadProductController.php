<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class UploadProductController extends Controller
{
    use FileUpload;

    public function index()
    {
        // Product::where('type', 'swing-sets')->get()->groupBy('category')->dd();
        // foreach (Product::where('width', "")->get() as $product) {
        //     $product->update(['width' => null]);
        // }
        // Product::where('type', 'dog-parks')->get()->groupBy('category')->dd();
        // Product::where('type', 'independent-play')->where('name', "2' x 4' Storage Cabinet")->get()->dd();
        // $products = Product::with(['images', 'shade'])->where('type', 'shade-shelter')->get();
        // foreach ($products as $product) {
        //     $product->images()->delete();
        //     $product->shade()->delete();
        //     $product->delete();
        // }
        // dd("deleted");

        // $products = Product::with('images')->where('type', 'dog-parks')->get();
        // foreach ($products as $product) {
        //     foreach ($product->images as $item) {
        //         $item->delete();
        //     }

        //     $product->delete();
        // }

        return view('upload-product');

    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file']
        ]);

        $file = $request->file('file');
        $data = Excel::toArray(new ProductsImport, $file);

        $products = [];

        foreach ($data[0] as $index => $product) {
            $age_group = isset($product['text5']) ? $product['text5'] : null;
            $sku = $product['text1'] ? explode(":", $product['text1'])[1] : null;
            $quick_ship_item = $product['text3'] ? trim(explode(":", $product['text3'])[1]) : null;
            // $quick_ship_item = $product['text3'] ? trim(explode("-", $product['text3'])[1]) : null;
            $lead_time = $product['text4'] ? trim(explode(":", $product['text4'])[1]) : null;
            // $lead_time = $product['text4'] ? trim(explode("-", $product['text4'])[1]) : null;
            $playground_series = $product['text8'] ? trim(explode(":", $product['text8'])[1]) : null;
            // $playground_series = null;
            $recycled_content = $product['text9'] ? trim(explode(":", $product['text9'])[1]) : null;
            // $recycled_content = null;
            $materials = $product['text10'] ? trim(explode(":", $product['text10'])[1]) : null;
            // $materials = $product['text17'] ?? null;
            $area = explode("x", $product['text6']);
            if (count($area) == 2) {
                $length = str_replace("'", "", trim($area[0]));
                $width = str_replace("'", "", trim($area[1]));
            } else {
                $length = $area[0];
                $width = $area[0];
            }
            $capacity = explode("-", $product['text7']);
            if (count($capacity) == 2) {
                $min_capacity = trim($capacity[0]);
                $max = explode(" ", $capacity[1]);
                $max_capacity = trim($max[0]) != "" ? trim($max[0]) : $capacity[0];
            } else {
                $capacity = explode("Child", $product['text7']);
                if (count($capacity) == 2) {
                    $min_capacity = trim($capacity[0]);
                    $max_capacity = trim($capacity[1]) != "" ? trim($capacity[1]) : $capacity[0];
                } else {
                    $min_capacity = $capacity[0];
                    $max_capacity = $capacity[0];
                }
            }


            // $glide_elbow = $product['text8'] ? trim(explode("?", $product['text8'])[1]) : null;
            // $fabric_types = $product['text9'] ? trim(explode("?", $product['text9'])[1]) : null;
            // $min_shade_size = $product['text10'] ? trim(str_replace("'", "", trim(explode("?", $product['text10'])[1]))) : null;
            // $max_shade_size = $product['text13'] ? trim(str_replace("'", "", trim(explode("?", $product['text13'])[1]))) : null;
            // $shade_frame_warranty = $product['text15'] ? trim(str_replace("Years", "", trim(explode("?", $product['text15'])[1]))) : null;
            // $shade_fabric_warranty = $product['text16'] ? trim(str_replace("Years", "", trim(explode("?", $product['text16'])[1]))) : null;

            $products[] = [
                'name' => $product['text'],
                // 'type' => 'commercial-play-equipment',
                'type' => 'swing-sets',
                // 'type' => 'shade-shelter',
                // 'type' => 'site-amenities',
                // 'type' => 'dog-parks',
                // 'type' => 'accessories-replacement-parts',
                // 'category' => "swing-sets",
                'category' => (string) Str::slug($product['category']),
                // 'sub_category' => (string) Str::slug($product['category']),
                'description' => $product['text2'],
                'sku' => $sku,
                'lead_time' => $lead_time,
                'age_group' => $age_group,
                'length' => $length === "" ? null : $length,
                'width' => $width === "" ? null : $width,
                'min_capacity' => $min_capacity === "" ? null : $min_capacity,
                'max_capacity' => $max_capacity === "" ? null : $max_capacity,
                // 'capacity' => null,
                'playground_series' => $playground_series,
                'recycled_content' => $recycled_content,
                'materials' => $materials,
                'description_html' => $product['text11'],
                // 'description_html' => $product['field'],
                // 'description_html' => $product['text11'] . " " . $product['text12'],
                'quick_ship_item' => $quick_ship_item,
                'dimensions' => isset($product['text17']) ? $product['text17'] : null,
                'images' => [$product['url']],
                'price' => fake()->numberBetween(550, 9999),
                // 'glide_elbow' => $glide_elbow,
                // 'fabric_types' => $fabric_types,
                // 'min_shade_size' => $min_shade_size,
                // 'max_shade_size' => $max_shade_size,
                // 'shade_frame_warranty' => $shade_frame_warranty,
                // 'shade_fabric_warranty' => $shade_fabric_warranty,
            ];
        }

        // dd($products);

        foreach ($products as $item) {
            // $product = Product::where('type', $item['type'])->where('category', $item['category'])->where('slug', Str::slug($item['name']))->first();
            // $product = Product::where('sku', $item['sku'])->first();
            $product = Product::where('category', $item['category'])->where('name', $item['name'])->first();

            if (!$product) {
                $product = Product::create($item);
                // $product->shade()->create([
                //     'glide_elbow' => $glide_elbow,
                //     'fabric_types' => $fabric_types,
                //     'min_shade_size' => $min_shade_size,
                //     'max_shade_size' => $max_shade_size,
                //     'shade_frame_warranty' => $shade_frame_warranty,
                //     'shade_fabric_warranty' => $shade_fabric_warranty,
                // ]);
            }

            foreach ($item['images'] as $image) {
                if ($image) {
                    $product->images()->create(['image' => $image]);
                }
            }
        }

        return back();

    }

}
