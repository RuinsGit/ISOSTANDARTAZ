<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\TranslationManage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $defaultTranslations = [
        'home' => 'Ana Sayfa',
        'about' => 'Hakkımızda',
        'services' => 'Hizmetler',
        'products' => 'Ürünler',
        'blog' => 'Blog',
        'contact' => 'İletişim',
        'search' => 'Ara',
        'loading' => 'Yükleniyor...',
        'cart' => 'Sepet',
        'wishlist' => 'Favoriler',
        'checkout' => 'Ödeme',
        'subtotal' => 'Ara Toplam',
        'shipping' => 'Kargo',
        'total' => 'Toplam',
        'working_hours' => 'Pazar - Cuma 24/7',
        'contact_us' => 'Bize Ulaşın',
        'call_us' => 'Bizi Arayın',
        'our_projects' => 'Projelerimiz',
        'location' => 'Konum',
        'store_location' => 'Mağaza Konumu',
        'footer_about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
        'pages' => 'Sayfalar',
        'portfolio' => 'Portfolyo',
        'our_blog' => 'Blog',
        'our_shop' => 'Mağazamız',
        'contact_we' => 'İletişim',
        'all_rights_reserved' => 'Tüm hakları saklıdır.',
        'number_footer' => '+90 123 456 7890'
    ];

    public function index()
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $products = Product::where('status', 1)
            ->with(['images', 'categories'])
            ->latest()
            ->paginate(12);

        $suggestedProducts = Product::where('status', 1)
            ->where('is_featured', 1)
            ->with(['images', 'categories'])
            ->limit(4)
            ->get();

        return view('front.pages.Product', compact('products', 'suggestedProducts', 'settings', 'translations'));
    }

    public function show($slug)
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $product = Product::where('slug_' . app()->getLocale(), $slug)
            ->where('status', 1)
            ->with(['images', 'categories', 'properties'])
            ->firstOrFail();

        $suggestedProducts = Product::where('status', 1)
            ->where('is_featured', 1)
            ->where('id', '!=', $product->id)
            ->with(['images', 'categories'])
            ->limit(4)
            ->get();

        return view('front.pages.product-details', compact('product', 'suggestedProducts', 'settings', 'translations'));
    }

    public function cart()
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }
        
        return view('front.pages.cart', compact('settings'));
    }

    public function wishlist()
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = [];
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $wishlist = Session::get('wishlist', []);
        $products = Product::whereIn('id', $wishlist)
            ->where('status', 1)
            ->with(['images', 'categories'])
            ->get();

        return view('front.pages.wishlist', compact('products', 'settings', 'translations'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');
        
        $product = Product::find($productId);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Ürün bulunamadı'
            ], 404);
        }
        
        // Eğer renk ve boyut seçimi varsa, stok durumunu kontrol et
        if ($colorId && $sizeId) {
            $stock = \App\Models\ProductStock::where('product_id', $productId)
                ->where('product_color_id', $colorId)
                ->where('product_size_id', $sizeId)
                ->where('status', 1)
                ->first();
            
            if (!$stock || $stock->quantity < $quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Yetersiz stok'
                ]);
            }
        }
        
        $cart = Session::get('cart', []);
        
        // Ürün kodu oluştur (ürün_id:renk_id:boyut_id)
        $productKey = $productId;
        
        if ($colorId) {
            $productKey .= ':' . $colorId;
        }
        
        if ($sizeId) {
            $productKey .= ':' . $sizeId;
        }
        
        // Sepete ekle veya güncelle
        if (isset($cart[$productKey])) {
            $cart[$productKey]['quantity'] += $quantity;
        } else {
            $cart[$productKey] = [
                'quantity' => $quantity,
                'color_id' => $colorId,
                'size_id' => $sizeId
            ];
        }
        
        Session::put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'cart_count' => count($cart)
        ]);
    }

    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        
        $wishlist = Session::get('wishlist', []);
        
        if (!in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
        }
        
        Session::put('wishlist', $wishlist);
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateCart(Request $request)
    {
        if ($request->product_id && $request->quantity) {
            $cart = Session::get('cart', []);
            
            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity'] = $request->quantity;
                Session::put('cart', $cart);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Sepet güncellendi'
                ]);
            }
        }
        
        return response()->json([
            'error' => 'Güncelleme başarısız'
        ], 400);
    }

    public function removeFromCart(Request $request)
    {
        if ($request->product_id) {
            $cart = Session::get('cart', []);
            
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                Session::put('cart', $cart);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Ürün sepetten kaldırıldı'
                ]);
            }
        }
        
        return response()->json([
            'error' => 'Silme işlemi başarısız'
        ], 400);
    }

    public function clearCart(Request $request)
    {
        Session::forget('cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Sepet temizlendi'
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        
        // Normalde bir kupon tablosu olur ve kontrol edilir
        // Şimdilik sadece test için basit bir kontrol yapalım
        if ($couponCode === 'TEST10') {
            Session::put('coupon', [
                'code' => $couponCode,
                'discount' => 10, // Yüzde 10 indirim
                'type' => 'percentage'
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Kupon uygulandı'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Geçersiz kupon kodu'
        ]);
    }

    public function checkStock(Request $request)
    {
        $productId = $request->input('product_id');
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');
        
        $stock = \App\Models\ProductStock::where('product_id', $productId)
            ->where('product_color_id', $colorId)
            ->where('product_size_id', $sizeId)
            ->where('status', 1)
            ->first();
        
        if ($stock && $stock->quantity > 0) {
            return response()->json([
                'in_stock' => true,
                'quantity' => $stock->quantity
            ]);
        }
        
        return response()->json([
            'in_stock' => false,
        ]);
    }
} 