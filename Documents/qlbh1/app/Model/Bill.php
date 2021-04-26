<?php

namespace App\Model;

use App\Mail\Inquiry;
use App\Mail\OrderMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class Bill extends Model
{
    const NEW = 1;
    const DELIVERY = 2;
    const DONE = 3;
    protected $fillable = [
        'shipping_price',
        'status',
        'cart_id',
        'shipping_address',
        'phone',
        'sub_total'
    ];

    const STATUS = [
        self::NEW => '<strong class="text-success">Tiếp nhận đơn hàng</strong>',
        self::DELIVERY => '<strong class="text-warning">Đang giao hàng</strong>',
        self::DONE => '<strong>Hoàn thành</strong>'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getStatusLabelAttribute()
    {
        return self::STATUS[$this->status];
    }

    public function getOrderDateAttribute()
    {
        if (!$this->created_at) {
            return '';
        }
        return $this->created_at->format('d/m/Y H:i');
    }

    public static function sendDeliveryEmail(Bill $bill)
    {
        Mail::to(config('mail.address'))
            ->send(new OrderMail('Giao hàng PCCC', $bill));
    }

    public static function sendDoneEmail(Bill $bill)
    {
        Mail::to(config('mail.address'))
            ->send(new OrderMail('Hoàn thành đơn hàng PCCC', $bill));
    }

    public function isDelivery()
    {
        return $this->status == self::DELIVERY;
    }

    public function isDone()
    {
        return $this->status == self::DONE;
    }
    public static function countActiveOrder(){
        $data=Bill::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
