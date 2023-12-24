<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\FeedbackModel;
use App\Models\BookingModel;
use App\Models\ShopModel;
use App\Models\PoolModel;
use App\Models\CartModel;
use App\Models\ManifestModel;
use App\Models\InvoiceModel;
use App\Models\OrderListModel;
use App\Models\OrdersModel;
use App\Models\AuditModel;
use App\Models\StaffModel;




class MainController extends ResourceController
{

    use ResponseTrait;
    protected $room;
    protected $orders;
    protected $orderitems;
    protected $invoice;
protected $cartModel;
    public function index()
    {
        //
    }
 
    public function deleteFeedback($feedId)
    {
        $feedbackModel = new FeedbackModel();
    
        try {
            $feedbackModel->update($feedId, ['is_hidden' => 1]); 
            return $this->respond(['message' => 'Feedback hidden successfully'], 200);
        } catch (\Exception $e) {
            return $this->respond(['error' => 'Failed to hide feedback: ' . $e->getMessage()], 500);
        }
    }
    public function hideStaff($staffId)
    {
        $staffbackModel = new StaffModel();
    
        try {
            $staffbackModel->update($staffId, ['hide_staff' => 1]); 
            return $this->respond(['message' => 'Staff hidden successfully'], 200);
        } catch (\Exception $e) {
            return $this->respond(['error' => 'Failed to hide staff: ' . $e->getMessage()], 500);
        }
    }
    public function getAuditHistory($shopId)
    {
        $shopModel = new ShopModel();
    
        $shopData = $shopModel->find($shopId);
    
        if (!$shopData) {
            return $this->respond(['message' => 'Shop not found'], 404);
        }
    
        $auditModel = new AuditModel();
        
        // Get the 'type' query parameter from the request
        $type = $this->request->getGet('type');
    
        // Define a condition based on the 'type' parameter
        $condition = [];
        if ($type && $type !== 'all') {
            $condition['type'] = $type;
        }
    
        $auditHistory = $auditModel
            ->where('shop_id', $shopId)
            ->where($condition)
            ->findAll();
    
        return $this->respond($auditHistory, 200);
    }
    
    public function updateProduct($id)
    {
      $data = $this->request->getJSON();
       $model = new ShopModel();
       $model->update($id, $data);

       return $this->respond(['status' => 'success', 'message' => 'Product updated successfully']);
    }
    public function updateQuantity($id)
{
    $quantity = (int) $this->request->getVar('quantity');
    
    $shopModel = new ShopModel();
    $product = $shopModel->find($id);

    if (!$product) {
        return $this->failNotFound('Product not found');
    }

    $newQuantity = $product['prod_quantity'] + $quantity;

    $shopModel->update($id, ['prod_quantity' => $newQuantity]);

    $auditModel = new AuditModel();
    $data = [
        'shop_id' => $product['shop_id'],
        'old_quantity' => $product['prod_quantity'],
        'new_quantity' => $newQuantity,
        'type' => 'inbound',
    ];
    $auditModel->save($data);

    return $this->respond(['new_quantity' => $newQuantity, 'message' => 'Quantity updated successfully']);
}

public function getStaff()
{
    $staff = new StaffModel();
    $data = $staff->where('hide_staff', 0)->findAll();

    return $this->respond($data, 200);
}   
    public function getInvoice()
    {
        $invoice = new InvoiceModel();
        $data = $invoice->findAll();
        return $this->respond($data, 200);
    }
    public function getManifest()
    {
        $manifest = new ManifestModel();
        $data = $manifest->findAll();
        return $this->respond($data, 200);
    }
    public function getCart($id)
    {
        $cart = new CartModel();
        $data = $cart->where('id',$id)->findAll();
        return $this->respond($data, 200);
    }
    public function getPool()
    {
        $pool = new PoolModel();
        $data = $pool->findAll();
        return $this->respond($data, 200);
    }
    public function getShop()
    {
        $shop = new ShopModel();
        $data = $shop->findAll();
        return $this->respond($data, 200);
    }
    public function getFeedback()
    {
        $f = new FeedbackModel();
    
        $data = $f->where('is_hidden', 0)->findAll();
    
        return $this->respond($data, 200);
    }
    
    public function getRoom()
    {
        $room = new RoomModel();
        $data = $room->findAll();
        return $this->respond($data, 200);
    }
    public function del()
    {
        $json = $this->request->getJSON();
        $cart_id = $json->cart_id;
        $cart = new CartModel();
        $r = $cart->delete($cart_id);
        return $this->respond($r, 200);
    }
    public function getData()
    {
        $main = new UserModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }
   public function getBook()
{
    $bookingModel = new BookingModel();
    
    $result = $bookingModel
        ->select('booking.*, user.*, room.*')
        ->join('user', 'user.id = booking.id') // Assuming 'user_id' is the foreign key in the 'booking' table
        ->join('room', 'room.room_id = booking.room_id')
        ->where('booking.booking_status !=', 'paid')
        ->where('booking.booking_status !=', 'declined')
        ->findAll();

    return $this->respond($result, 200);
}

    
    public function acceptBooking($booking_id)
    {
        $roomModel = new RoomModel();
        $bookingModel = new BookingModel();
    
        $booking = $bookingModel->find($booking_id);
    
        if ($booking) {
            $updatedBooking = $bookingModel->update($booking['book_id'], ['booking_status' => 'confirmed']);
    
            if ($updatedBooking) {
                $updatedRoom = $roomModel->update($booking['room_id'], ['room_status' => 'booked']);
    
                if ($updatedRoom) {
                    return $this->respond(['message' => 'Booking and room status updated successfully', 'booking_id' => $booking['book_id']], 200);
                } else {
                    $bookingModel->update($booking['book_id'], ['booking_status' => 'pending']);
                    return $this->respond(['message' => 'Failed to update room status'], 500);
                }
            } else {
                return $this->respond(['message' => 'Failed to update booking status'], 500);
            }
        } else {
            return $this->respond(['message' => 'Booking not found'], 404);
        }
    }
    public function markAsPaid($booking_id)
    {
        $roomModel = new RoomModel();
        $bookingModel = new BookingModel();
    
        $booking = $bookingModel->find($booking_id);
    
        if ($booking) {
            $updatedBooking = $bookingModel->update($booking['book_id'], ['booking_status' => 'paid']);
    
            if ($updatedBooking) {
                $updatedRoom = $roomModel->update($booking['room_id'], ['room_status' => 'Available']);
    
                if ($updatedRoom) {
                    return $this->respond(['message' => 'Booking status updated to "Paid" and room status updated to "Available"', 'booking_id' => $booking['book_id']], 200);
                } else {
                    $bookingModel->update($booking['book_id'], ['booking_status' => 'confirmed']);
                    return $this->respond(['message' => 'Failed to update room status'], 500);
                }
            } else {
                return $this->respond(['message' => 'Failed to update booking status'], 500);
            }
        } else {
            return $this->respond(['message' => 'Booking not found'], 404);
        }
    }
    
    public function booking()
    {
        $json = $this->request->getJSON();
        $room_id = $json->room_id;
        $this->room = new RoomModel();
        $booked = $this->room->where(['room_id' => $room_id])->first();
    
        $data = [
            'id' => $json->id,
            'checkin' => $json->checkin,
            'checkout' => $json->checkout,
            'adult' => $json->adult,
            'child' => $json->child,
            'specialRequest' => $json->specialRequest,
            'room_id' => $json->room_id,
            'booking_status' => 'pending',
            'payment_method' => $json->payment_method,
        ];
    
        // Check if the total persons exceed bed capacity
        $totalPersons = ceil($json->adult / 2) + ceil($json->child / 2); // 2 adults or 2 children or both for 1 bed
        $bedCapacity = $booked['bed'];
    
        if ($totalPersons > $bedCapacity) {
            return $this->respond(['message' => 'Booking failed. Exceeds bed capacity.'], 400);
        }
    
        $booking = new BookingModel();
        $r = $booking->save($data);
    
        if ($r) {
            $bookedr = $this->room->update($booked['room_id'], ['room_status' => 'pending']);
    
            if ($bookedr) {
                return $this->respond(['message' => 'Booked successfully', 'booking' => $r, 'room' => $booked], 200);
            } else {
                return $this->respond(['message' => 'Failed to update room status'], 500);
            }
        } else {
            return $this->respond(['message' => 'Booking failed'], 500);
        }
    }
    
    
    
    public function declineBooking($booking_id)
    {
        $roomModel = new RoomModel();
        $bookingModel = new BookingModel();
    
        $booking = $bookingModel->find($booking_id);
    
        if ($booking) {
            // Check if the booking status is 'pending'
            if ($booking['booking_status'] === 'pending') {
                // Update the booking status to 'declined' and add a message
                $updatedBooking = $bookingModel->update($booking['book_id'], [
                    'booking_status' => 'declined',
                    'message' => 'Booking declined.']);
    
                if ($updatedBooking) {
                    // Optional: Update the room status or perform any other necessary actions
                    $updatedRoom = $roomModel->update($booking['room_id'], ['room_status' => 'booked']);
    
                    // Return the response
                    return $this->respond(['message' => 'Booking declined successfully', 'booking_id' => $booking['book_id']], 200);
                } else {
                    return $this->respond(['message' => 'Failed to decline booking'], 500);
                }
            } else {
                return $this->respond(['message' => 'Cannot decline booking with the current status'], 400);
            }
        } else {
            return $this->respond(['message' => 'Booking not found'], 404);
        }
    }
    
    
    

    public function getDataShop()
    {
        $main = new ShopModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }

    public function save()
    {
        $json = $this->request->getJSON();
        $data = [
            'feedback' => $json->feedback,
            'id' => $json->id,
            'is_hidden' => 0,
    
        ];
    
        $feedback = new FeedbackModel();
        $result = $feedback->save($data);
    
        return $this->respond(['message' => 'Feedback submitted successfully', $result], 200);
    }
    
    public function manifest()
    {
        $json = $this->request->getJSON();
        $data = [
            'manifest' => $json->manifest,
            'id' => $json->id,
        ];

        $manifest = new ManifestModel();
        $result = $manifest->save($data);

        return $this->respond(['message' => 'Manifest submitted successfully', $result], 200);
    }
    public function register()
    {
        $json = $this->request->getJSON();
        $email = $json->email;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->respond(["error" => "Invalid email format"], 400);
        }
        $userModel = new UserModel();
        $token = $this->verification(50);
        $exUser = $userModel->where('email', $email)->first();

        if ($exUser) {
            return $this->respond(["error" => "Email already exists"], 400);
        } else {
            $password = $json->password;

            if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                return $this->respond(["error" => "Password must contain at least one letter, one number, and one special character"], 400);
            }

            $data = [
                'name' => $json->name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'token' => $token,
                'status' => 'active',
                'role' => 'user',
            ];

            $u = $userModel->save($data);
            if ($u) {
                return $this->respond(['msg' => 'Registered Successfully', 'token' => $token]);
            } else {
                return $this->respond(['msg' => 'Error occurred']);
            }
        }
    }


    public function verification($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_-/*$#@.,<>=%!()?{}[]';
        return substr(str_shuffle($str_result), 0, $length);
    }

    public function login()
    {
        $json = $this->request->getJSON();
    
        if (isset($json->email) && isset($json->password)) {
            $email = $json->email;
            $password = $json->password;
    
            $userModel = new UserModel();
            $data = $userModel->where('email', $email)->first();
    
            if ($data) {
                $pass = $data['password'];
                $auth = password_verify($password, $pass);
    
                if ($auth) {
                    return $this->respond([
                        'message' => 'Login successful',
                        'token' => $data['token'],
                        'id' => $data['id'],
                        'role' => $data['role'],  
                    ], 200);
                } else {
                    return $this->respond(['message' => 'Invalid email or password'], 401);
                }
            } else {
                return $this->respond(['message' => 'Invalid email or password'], 401);
            }
        } else {
            return $this->respond(['message' => 'Invalid JSON data'], 400);
        }
    }
    
    public function submitRating()
    {
        $json = $this->request->getJSON();
        $shop_id = $json->shop_id;
        $rating = $json->rating;

        $shopModel = new ShopModel();

        $shopData = $shopModel->find($shop_id);

        if (!$shopData) {
            return $this->respond(['error' => 'Shop not found'], 404);
        }

        $newRatingsCount = $shopData['ratings_count'] + 1;
        $newTotalRatings = $shopData['total_ratings'] + $rating;

        $newRating = $newTotalRatings / $newRatingsCount;

        $updateResult = $shopModel->update($shop_id, [
            'rating' => $newRating,
            'ratings_count' => $newRatingsCount,
            'total_ratings' => $newTotalRatings,
        ]);

        if ($updateResult) {
            return $this->respond(['success' => true, 'newRating' => $newRating]);
        } else {
            return $this->respond(['error' => 'Failed to update rating'], 500);
        }
    }

    public function logout()
    {
        session()->destroy();

        return $this->response->setStatusCode(200)->setJSON(['message' => 'Logout successful']);
    }
    public function Cart()
{
    $cart = new CartModel();
    $json = $this->request->getJSON();

    $shop_id = $json->shop_id;
    $user = $json->id;
    $quantity = $json->quantity; 
    $shopModel = new ShopModel();
    $product = $shopModel->find($shop_id);

    if (!$product) {
        return $this->respond(['message' => 'Product not found'], 404);
    }

    if ($product['prod_quantity'] < $quantity) {
        return $this->respond(['message' => 'Insufficient stock quantity'], 400);
    }

    $existing = $cart->where(['id' => $user, 'shop_id' => $shop_id])->first();

    if ($existing) {
        $existing['quantity'] += $quantity;
        $updateResult = $cart->update($existing['cart_id'], $existing);

        if ($updateResult) {
            // $newQuantity = $product['prod_quantity'] - $quantity;
            // $shopModel->update($shop_id, ['prod_quantity' => $newQuantity]);

            return $this->respond(['message' => 'Item quantity updated in the cart'], 200);
        } else {
            return $this->respond(['message' => 'Failed to update item quantity in the cart'], 500);
        }
    } else {
        $data = [
            'id' => $user,
            'shop_id' => $shop_id,
            'quantity' => $quantity,
        ];

        $addcart = $cart->save($data);

        if ($addcart) {
            // $newQuantity = $product['prod_quantity'] - $quantity;
            // $shopModel->update($shop_id, ['prod_quantity' => $newQuantity]);

            return $this->respond(['message' => 'Item added to cart successfully'], 200);
        } else {
            return $this->respond(['message' => 'Failed to add item to cart'], 500);
        }
    }
}
    public function updateCartQuantity()
    {
      $json = $this->request->getJSON();
    
      $cart_id = $json->cart_id;
      $quantity = $json->quantity;
    
      $cart = new CartModel();
      $existing = $cart->find($cart_id);
    
      if ($existing) {
        $existing['quantity'] = $quantity;
        $updateResult = $cart->update($cart_id, $existing);
    
        if ($updateResult) {
          return $this->respond(['message' => 'Quantity updated successfully'], 200);
        } else {
          return $this->respond(['message' => 'Failed to update quantity'], 500);
        }
      } else {
        return $this->respond(['message' => 'Cart item not found'], 404);
      }
    }




























    
    public function checkout()
    {
        $this->invoice = new InvoiceModel();
        $this->orderitems = new OrderListModel();
        $this->orders = new OrderSModel();
        $json = $this->request->getJSON();
        $id = $json->id;
    
        foreach ($json->items as $item) {
            $shopModel = new ShopModel();
            $product = $shopModel->find($item->shop_id);
    
            if (!$product || $product['prod_quantity'] < $item->quantity) {
                return $this->respond(['message' => 'Insufficient stock for one or more items'], 400);
            }
        }
    
        $order = [
            'id' => $id,
            'order_status' => 'pending',
            'total_price' => $json->total_price,
            'order_payment_method' =>$json->order_payment_method
        ];
    
        $this->orders->save($order);
    
        $order_id = $this->orders->insertID();
    
        foreach ($json->items as $item) {
            $orderitem = [
                'id' => $id,
                'shop_id' => $item->shop_id,
                'quantity' => $item->quantity,
                'final_price' => $item->total_price,
                'order_id' => $order_id,
            ];
    
            $this->orderitems->save($orderitem);
        }

        $inv = [
            'id' => $id,
            'order_id' => $order_id,
        ];
    
        $this->invoice->save($inv);
    
        if ($this->orders->affectedRows() > 0 && $this->orderitems->affectedRows() > 0 && $this->invoice->affectedRows() > 0) {
            return $this->respond(['message' => 'Checkout successful'], 200);
        } else {
            return $this->respond(['message' => 'Checkout failed'], 500);
        }
    }
    
    public function markOrderPaid($orderId)
    {
        $ordersModel = new OrdersModel();
        $shopModel = new ShopModel();
    
        $this->orderitems = new OrderListModel();
    
        $order = $ordersModel->find($orderId);
    
        if ($order && $order['order_status'] === 'confirmed') {
            $ordersModel->update($orderId, ['order_status' => 'paid']);
    
            $orderItems = $this->orderitems->where('order_id', $orderId)->findAll();
    
            foreach ($orderItems as $item) {
                $product = $shopModel->find($item['shop_id']);
    
                if ($product) {
                    $newQuantity = $product['prod_quantity'] - $item['quantity'];
                    $shopModel->update($item['shop_id'], ['prod_quantity' => $newQuantity]);
    
                    $auditModel = new AuditModel();
                    $auditData = [
                        'shop_id' => $product['shop_id'],
                        'old_quantity' => $product['prod_quantity'],
                        'new_quantity' => $newQuantity,
                        'type' => 'sold',
                    ];
                    $auditModel->save($auditData);
                }
            }
    
            return $this->response->setJSON(['message' => 'Order marked as paid successfully']);
        } else {
            return $this->response->setJSON(['message' => 'Invalid order or order is not confirmed'], 400);
        }
    }
    public function declineOrder($orderId)
{
    $ordersModel = new OrdersModel();

    $order = $ordersModel->find($orderId);

    if ($order && $order['order_status'] === 'pending') {
        // Update the order status to 'declined'
        $ordersModel->update($orderId, ['order_status' => 'declined']);

        // Optional: You can perform additional actions specific to declining orders here

        return $this->response->setJSON(['message' => 'Order declined successfully']);
    } else {
        return $this->response->setJSON(['message' => 'Invalid order or order is not pending'], 400);
    }
}

    
public function confirmOrder($orderId)
{
    $ordersModel = new OrdersModel();

    $ordersModel->update($orderId, ['order_status' => 'confirmed']);

    return $this->response->setJSON(['message' => 'Order confirmed successfully']);
}























        public function saveShop()
        {
            $request = $this->request;
        
            $data = [
                'prod_name' => $request->getPost('prod_name'),
                'prod_quantity' => $request->getPost('prod_quantity'),
                'prod_desc' => $request->getPost('prod_desc'),
                'prod_price' => $request->getPost('prod_price'),
            ];
        
            if ($request->getFile('prod_image')->isValid()) {
                $image = $request->getFile('prod_image');
        
                $imageName = $image->getName();
        
                $data['prod_img'] = $this->handleImageUpload($image, $imageName);
            }
        
            $shopModel = new ShopModel();
        
            try {
                $shopModel->insert($data);
                return $this->respond(["message" => "Data saved successfully"], 200);
            } catch (\Exception $e) {
                return $this->respond(["message" => "Failed to save data: " . $e->getMessage()], 500);
            }
        }
        
        public function handleImageUpload($image, $imageName)
        {
            $uploadPath = 'C:/laragon/www/BALMES-CARINGAL-MANALO-FINALPROJECT/frontend/src/assets/img';

            $image->move($uploadPath, $imageName);
                        return  $imageName;
        }

        public function saveRoom()
{
    $request = $this->request;

    $data = [
        'room_name' => $request->getPost('room_name'),
        'price' => $request->getPost('price'),
        'bed' => $request->getPost('bed'),
        'bath' => $request->getPost('bath'),
        'description' => $request->getPost('description'),
    ];

    if ($request->getFile('image')->isValid()) {
        $image = $request->getFile('image');

        $imageName = $image->getName();

        $data['image'] = $this->handleRoomImageUpload($image, $imageName);
    }

    $roomModel = new RoomModel(); // Assuming you have a RoomModel

    try {
        $roomModel->insert($data);
        return $this->respond(["message" => "Room data saved successfully"], 200);
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to save room data: " . $e->getMessage()], 500);
    }
}
public function handleRoomImageUpload($image, $imageName)
{
    $uploadPath = 'C:/laragon/www/BALMES-CARINGAL-MANALO-FINALPROJECT/frontend/src/assets/img';

    $image->move($uploadPath, $imageName);
                return  $imageName;
}
public function updateShop($shop_id = null)
{
    $request = $this->request;

    $shopModel = new ShopModel();
    $existingData = $shopModel->find($shop_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    $data = [
        'prod_name' => $request->getVar('prod_name') ?? $existingData['prod_name'],
        'prod_desc' => $request->getVar('prod_desc') ?? $existingData['prod_desc'],
        'prod_price' => $request->getVar('prod_price') ?? $existingData['prod_price'],
    ];

    try {
        if ($data !== array_intersect_key($existingData, $data)) {
            $shopModel->update($shop_id, $data);
            return $this->respond(["message" => "Data updated successfully"], 200);
        } else {
            return $this->respond(["message" => "No changes detected, data not updated"], 200);
        }
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to update data: " . $e->getMessage()], 500);
    }
}
public function updateRoom($room_id = null)
{
    $request = $this->request;

    $roomModel = new RoomModel();
    $existingData = $roomModel->find($room_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    $data = [
        'room_name' => $request->getVar('room_name') ?? $existingData['room_name'],
        'price' => $request->getVar('price') ?? $existingData['price'],
        'bed' => $request->getVar('bed') ?? $existingData['bed'],
        'bath' => $request->getVar('bath') ?? $existingData['bath'],
        'description' => $request->getVar('description') ?? $existingData['description'],
        'room_status' => $request->getVar('room_status') ?? $existingData['room_status'],
    ];

    try {
        if ($data !== array_intersect_key($existingData, $data)) {
            $roomModel->update($room_id, $data);
            return $this->respond(["message" => "Data updated successfully"], 200);
        } else {
            return $this->respond(["message" => "No changes detected, data not updated"], 200);
        }
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to update data: " . $e->getMessage()], 500);
    }
}

public function handleEditImageUpload($image, $imageName)
{
    $uploadPath = 'C:/laragon/www/BALMES-CARINGAL-MANALO-FINALPROJECT/frontend/src/assets/img';

    $image->move($uploadPath, $imageName);
                return  $imageName;
}
public function saveStaff()
{
    $request = $this->request;

    $data = [
        'staff_name' => $request->getPost('staff_name'),
        'staff_email' => $request->getPost('staff_email'),
        'contactNum' => $request->getPost('contactNum'),
        'hide_staff' => 0,

    ];

    if ($request->getFile('staff_image')->isValid()) {
        $image = $request->getFile('staff_image');

        $imageName = $image->getName();

        $data['staff_image'] = $this->handleStaffImageUpload($image, $imageName);
    }

    $staff = new StaffModel();

    try {
        $staff->insert($data);
        return $this->respond(["message" => "Data saved successfully"], 200);
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to save data: " . $e->getMessage()], 500);
    }
}

public function handleStaffImageUpload($image, $imageName)
{
    $uploadPath = 'C:/laragon/www/BALMES-CARINGAL-MANALO-FINALPROJECT/frontend/src/assets/img';

    $image->move($uploadPath, $imageName);
                return  $imageName;
}



public function updateStaff($staff_id = null)
{
    $request = $this->request;

    $staffModel = new StaffModel();
    $existingData = $staffModel->find($staff_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    $data = [
        'staff_name' => $request->getVar('staff_name') ?? $existingData['staff_name'],
        'staff_email' => $request->getVar('staff_email') ?? $existingData['staff_email'],
        'contactNum' => $request->getVar('contactNum') ?? $existingData['contactNum'],
    ];

    try {
        if ($data !== array_intersect_key($existingData, $data)) {
            $staffModel->update($staff_id, $data);
            return $this->respond(["message" => "Data updated successfully"], 200);
        } else {
            return $this->respond(["message" => "No changes detected, data not updated"], 200);
        }
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to update data: " . $e->getMessage()], 500);
    }
}


public function deleteStaff($staff_id = null)
{
    $staffModel = new StaffModel();
    $existingData = $staffModel->find($staff_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    try {
        $staffModel->delete($staff_id);
        return $this->respond(["message" => "Data deleted successfully"], 200);
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to delete data: " . $e->getMessage()], 500);
    }
}

public function deleteRoom($room_id = null)
{
    $RoomModel = new RoomModel();
    $existingData = $RoomModel->find($room_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    try {
        $RoomModel->delete($room_id);
        return $this->respond(["message" => "Data deleted successfully"], 200);
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to delete data: " . $e->getMessage()], 500);
    }
}
public function deleteShop($shop_id = null)
{
    $ShopModel = new ShopModel();
    $existingData = $ShopModel->find($shop_id);

    if (empty($existingData)) {
        return $this->respond(["message" => "Record not found"], 404);
    }

    try {
        $ShopModel->delete($shop_id);
        return $this->respond(["message" => "Data deleted successfully"], 200);
    } catch (\Exception $e) {
        return $this->respond(["message" => "Failed to delete data: " . $e->getMessage()], 500);
    }
}

    public function resetPassword()
    {
        $email = $this->request->getJSON()->email;

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->respond(['message' => 'Invalid email'], 404);
        }

        $newPassword = bin2hex(random_bytes(8));

        $userModel->set('password', password_hash($newPassword, PASSWORD_DEFAULT));
        $userModel->where('email', $email);
        $userModel->update();


        return $this->respond(['message' => 'Password reset successful', 'newPassword' => $newPassword]);
    }

    public function updatePassword()
    {
        $jsonData = $this->request->getJSON(true);
        $email = $jsonData['email'];
        $newPassword = $jsonData['newPassword'];
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
    
        if (!$user) {
            return $this->respond(['message' => 'Invalid email'], 404);
        }
    
        // Use the set method to set the password column
        $userModel->set('password', password_hash($newPassword, PASSWORD_DEFAULT));
    
        $userModel->where('email', $email);
    
        $userModel->update();
    
        return $this->respond(['message' => 'Password updated successfully']);
    }
    


    public function  search($query){
        $roomModel = new RoomModel();
        
        $filteredData = $roomModel->searchInRoom($query);
        
        
        return json_encode($filteredData);
    }

    public function getInvoices($invoice_id)
    {
        $shopModel = new ShopModel();
        $orderListModel = new OrderListModel();
        $ordersModel = new OrdersModel();
        $invoiceModel = new InvoiceModel();
        $userModel = new UserModel();
    
        $result = $shopModel
            ->select('shop.*, order_list.*, orders.*, invoices.*, user.*')
            ->join('order_list', 'order_list.shop_id = shop.shop_id')
            ->join('orders', 'orders.order_id = order_list.order_id')
            ->join('invoices', 'invoices.order_id = orders.order_id')
            ->join('user', 'user.id = orders.id')
            ->where('invoices.invoice_id', $invoice_id)
            ->findAll();
    
        return $this->respond($result, 200);
    }
    public function getUserOrders()
    {
        $userModel = new UserModel();
        $ordersModel = new OrdersModel();
        $shopModel = new ShopModel();

        $orders = $ordersModel->select('orders.*, order_list.*, shop.*, user.name as user_name')
            ->join('order_list', 'order_list.order_id = orders.order_id')
            ->join('shop', 'shop.shop_id = order_list.shop_id')
            ->join('user', 'user.id = orders.id') 
            ->where('orders.order_status !=', 'paid') 
            ->where('orders.order_status !=', 'declined') 

            ->findAll();
        
        return $this->response->setJSON(['orders' => $orders]);
    }


    
    public function checkoutpos()
    {
        $this->invoice = new InvoiceModel();
        $this->orderitems = new OrderListModel();
        $this->orders = new OrderSModel();
        $this->cartModel = new CartModel(); // Add CartModel
    
        $json = $this->request->getJSON();
        $id = $json->id;
    
        foreach ($json->items as $item) {
            $shopModel = new ShopModel();
            $product = $shopModel->find($item->shop_id);
    
            if (!$product || $product['prod_quantity'] < $item->quantity) {
                return $this->respond(['message' => 'Insufficient stock for one or more items'], 400);
            }
        }
    
        $order = [
            'id' => $id,
            'order_status' => 'paid',
            'total_price' => $json->total_price,
        ];
    
        $this->orders->save($order);
    
        $order_id = $this->orders->insertID();
    
        foreach ($json->items as $item) {
            $orderitem = [
                'id' => $id,
                'shop_id' => $item->shop_id,
                'quantity' => $item->quantity,
                'total_price' => $item->total_price,
                'order_id' => $order_id,
            ];
    
            $this->orderitems->save($orderitem);
    
            $product = $shopModel->find($item->shop_id);
    
            if ($product) {
                $newQuantity = $product['prod_quantity'] - $item->quantity;
                $shopModel->update($item->shop_id, ['prod_quantity' => $newQuantity]);
    
                $auditModel = new AuditModel();
                $auditData = [
                    'shop_id' => $product['shop_id'],
                    'old_quantity' => $product['prod_quantity'],
                    'new_quantity' => $newQuantity,
                    'type' => 'sold',
                ];
                $auditModel->save($auditData);
            }
        }
    
        $inv = [
            'id' => $id,
            'order_id' => $order_id,
        ];
    
        $this->invoice->save($inv);    
        if ($this->orders->affectedRows() > 0 && $this->orderitems->affectedRows() > 0 && $this->invoice->affectedRows() > 0) {
            return $this->respond(['message' => 'Checkout successful'], 200);
        } else {
            return $this->respond(['message' => 'Checkout failed'], 500);
        }
    }
    
}

    