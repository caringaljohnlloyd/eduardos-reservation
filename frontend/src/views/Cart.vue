<template>
  <div>
    <Top />
    <navbar />
    <div class="container-fluid padding-bottom-3x mb-1">
      <Notification v-if="deleteSuccess" :show="deleteSuccess" type="success" message="Deleted successfully!" />

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Product Name</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">Total Price</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="cart in cart" :key="cart.shop_id">
              <td class="align-middle">
                <div class="product-item">
                  <div class="custom-control custom-checkbox" style="float: left; margin-right: 10px; margin-top: 10px;">
                    <input type="checkbox" :id="'checkbox_' + cart.cart_id" v-model="checkedItems" :value="cart.cart_id"
                      @click="check(cart.cart_id)">
                    <label class="custom-control-label" :for="'checkbox' + cart.shop_id"></label>
                  </div>
                  <a class=""><img class="img-fluid menu"
                      style="width: 100%; max-width: 250px; height: 200px; margin-top: 5px;"
                      :src="require('@/assets/img/' + getImg(cart).prod_img)" alt="Product"></a>
                  <div class="product-info">
                    <h4 class="product-title">{{ getInfo(cart).prod_name }}</h4>
                  </div>
                </div>
              </td>


              <td class="align-middle text-center">
                <div class="count-input">
                  <button @click="updateQuantity(cart, 'decrement')" class="btn btn-primary btn-sm rounded-circle"
                    :disabled="cart.quantity <= 1">
                    <i class="fas fa-minus"></i>
                  </button>
                  <span class="quantity">{{ cart.quantity }}</span>
                  <button @click="updateQuantity(cart, 'increment')" class="btn btn-primary btn-sm rounded-circle"
                    :disabled="cart.quantity >= getMaxQuantity(cart)">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </td>


              <td class=" align-middle text-center text-lg text-medium">{{ getPrice(cart).prod_price }}</td>
              <td class="align-middle text-center text-lg text-medium">{{ getTotal(cart) }}</td>
              <td class="align-middle text-center">
                <button @click="deleteCart(cart.cart_id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="floating-container">
        <div class="container">
          <div class="shopping-cart-footer">
           
<!-- invoice section-->
          
<div class="column text-lg invoice-section sticky-column">
              <h4>Products to Pay:</h4>
              <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="cartId in checkedItems" :key="cartId">
        
        <td>{{ getInfo(getCartItem(cartId)).prod_name }}</td>
        <td>Php.{{ getPrice(getCartItem(cartId)).prod_price }}</td>
      </tr>
    </tbody>
  </table>
  <div>
          <h4>Total:</h4> <span class="text-medium">Php.{{ calculateSubtotal() }}</span>
        </div>
      </div>
      <div class="column checkout-button-section">
              <div class="shopping-cart-footer">
                <div class="column">
                  <div class="payment-form">
      <h4>Select Payment Method:</h4>
      <div>
        <label>
          <input type="radio" v-model="paymentMethod" value="credit_card">
          Credit Card
        </label>
      </div>
      <div>
        <label>
          <input type="radio" v-model="paymentMethod" value="paypal">
          PayPal
        </label>
      </div>
      <div>
        <label>
          <input type="radio" v-model="paymentMethod" value="cash">
          Cash
        </label>
      </div>
      
                  <a class="btn btn-dark" @click="checkout">Proceed to Checkout</a>
                  
                </div>
  

              </div>
            </div>
          </div>
        </div>
      </div>






      <div class="column checkout-products-section">
  <h4>Checkout Products:</h4>
  <table class="table">
    <thead>
            <tr>
              <th class="text-center">Product Name</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total Price</th>
            </tr>
          </thead>
    <tbody>
      <tr v-for="product in checkedOutProducts" :key="product.cart_id">
        
        <td>{{ getInfo(product).prod_name }}</td>
        <td>Php.{{ getPrice(product).prod_price }}</td>
        <td>{{ product.quantity }}</td>
        <td>Php.{{ getTotal(product) }}</td>
      </tr>
    </tbody>
  </table>

</div>


<br>
<br>
  <br>
  <br>
  <br>
  <Notification v-if="insufficientStockError" :show="insufficientStockError" type="error" message="Insufficient stock for one or more items" />
  <Notification v-if="notification.show" :show="notification.show" :type="notification.type" :message="notification.message" />

  <Notification v-if="checkoutSuccess" :show="checkoutSuccess" type="success" message="Checkout successful!" />
  <Notification v-if="checkoutError" :show="checkoutError" type="error" message="Please select items before proceeding with the checkout." />

  <End />
  <spinner />
</div>
</div>
</div>

</template>

<script>
import axios from 'axios';
import Top from '@/components/Top.vue';
import navbar from '@/components/navbar.vue';
import End from '@/components/End.vue';
import spinner from '@/components/spinner.vue';
import Notification from "@/components/Notification.vue";

export default {
  name: 'cart',
  components: {
    spinner, Top,
    navbar,
    End,    Notification,    


  },
  data() {
    return {
      paymentMethod: null, // Add the payment method you want to capture
      cartCheckedOutIds: [],
      checkedItems: [],
    checkedOutProducts: [],
       cart: [],
      deleteSuccess: false,
      prod_name: [],
      prod_price: [],
      prod_img: [],
      user: null,
      checkedItems: [],
      checkoutSuccess: false,
      checkoutError: false,
      insufficientStockError: false, 
      notification: {
        show: false,
        type: "",
        message: "",
      },

    };
  },
  mounted() {
    this.getCart();
    this.getInfo();
    this.getPrice();
    this.getImg();


  },
  methods: {
    handlePaymentSelection(paymentMethod) {
      this.paymentMethod = paymentMethod;
    },
    getCartItem(cartId) {
    return this.cart.find(cart => cart.cart_id === cartId) || {};
  },
    async getCart() {
      const id = sessionStorage.getItem("id");
      try {
        const [prod, user, shop] = await Promise.all([
          axios.get(`/getProd/${id}`),
          axios.get("/getData"),
          axios.get("/getShop"),
        ]);

        this.cart = prod.data.map(item => ({
          ...item,
          selected: false,
        }));

        this.data = user.data;
        this.prod_name = shop.data;
        this.prod_price = shop.data;
        this.prod_img = shop.data;
      } catch (error) {
        console.error("Error fetching cart:", error);
      }
    },

    getInfo(prod) {
  const shop = this.prod_name.find(shop => shop.shop_id === prod.shop_id) || {};
  console.log(`Product Name: ${shop.prod_name}, Price: ${shop.prod_price}`);
  return shop;
},

    getPrice(prod) {
      return this.prod_price.find(shop => shop.shop_id === prod.shop_id) || {};

    },
    getImg(prod) {
      return this.prod_img.find(shop => shop.shop_id === prod.shop_id) || {};

    },
    async deleteCart(delcart) {
      const confirmResult = await new Promise(resolve => {
        const confirmDialog = window.confirm("Do you want to DELETE this item?");
        resolve(confirmDialog);
        this.deleteSuccess = true;
      setTimeout(() => {
        this.deleteSuccess = false;
      }, 2000);
      });

      if (confirmResult) {
        try {
          await axios.post("del", {
            cart_id: delcart,
          });

          this.cart = this.cart.filter(item => item.cart_id !== delcart);
          this.deleteSuccess = true;
          setTimeout(() => {
            this.deleteSuccess = false;
          }, 2000);
        } catch (error) {
          console.error("Error deleting item:", error);
        }
      }
    },
    getMaxQuantity(cart) {
      const item = this.getInfo(cart);
      return item.prod_quantity || 0;
    },

    updateQuantity(cart, action) {
      if (action === 'increment' && cart.quantity < this.getMaxQuantity(cart)) {
        cart.quantity++;
      } else if (action === 'decrement' && cart.quantity > 1) {
        cart.quantity--;
      }

      this.updateTotalPrice(cart);
    },
    updateTotalPrice(cart) {
      const item = this.getInfo(cart);
      const newTotal = (item.prod_price || 0) * cart.quantity;

      axios.post("/updateCartQuantity", {
        cart_id: cart.cart_id,
        quantity: cart.quantity,
      })
        .then(response => {
          console.log(response.data);
        })
        .catch(error => {
          console.error("Error updating quantity:", error);
        });
    },
    getTotal(prod) {
      const item = this.getInfo(prod);
      return (item.prod_price || 0) * prod.quantity;
    },

    calculateSubtotal() {
  const subtotal = this.checkedItems.reduce((total, cartId) => {
    const prod = this.cart.find(item => item.cart_id === cartId);
    if (prod) {
      const item = this.getInfo(prod);
      const itemTotal = (item.prod_price || 0) * prod.quantity;
      console.log(`Cart ID: ${cartId}, Product Name: ${item.prod_name}, Price: ${item.prod_price}, Item Total: ${itemTotal}`);
      return total + itemTotal;
    }
    return total;
  }, 0).toFixed(2);

  console.log('Selected Items:', this.checkedItems);

  return subtotal;
},


async checkout() {
  try {
    const id = sessionStorage.getItem("id");

    if (this.checkedItems.length === 0) {
      console.warn("No items selected for checkout.");
      this.checkoutError = true;
      setTimeout(() => {
        this.checkoutError = false;
      }, 3000);
      return;
    }

    if (!this.paymentMethod) {
      console.warn("Please select a payment method.");
      this.notification = {
        show: true,
        type: 'error',
        message: 'Please select a payment method.',
      };
      setTimeout(() => {
        this.notification = {
          show: false,
          type: '',
          message: '',
        };
      }, 3000);
      return;
    }

    const orderItems = this.checkedItems.map(cartId => {
      const cart = this.cart.find(cart => cart.cart_id === cartId);
      const shop_id = cart ? cart.shop_id : null;

      return {
        shop_id: shop_id,
        quantity: cart ? cart.quantity : 0,
        total_price: this.getTotal(cart),
      };
    });

    const orderData = {
      id: id,
      status: 'pending',
      total_price: parseFloat(this.calculateSubtotal()),
      items: orderItems,
      order_payment_method: this.paymentMethod, 
    };

    const response = await axios.post('checkout', orderData);

    if (response.status === 400) {
      console.warn("Insufficient stock for one or more items");
      this.notification = {
        show: true,
        type: 'error',
        message: 'Insufficient stock for one or more items',
      };
      setTimeout(() => {
        this.notification = {
          show: false,
          type: '',
          message: '',
        };
      }, 3000);
      return;
    }

    if (response.status === 200) {
      const invoice_id = response.data.invoice_id;

      const newlyCheckedOutProducts = this.cart.filter(cart => this.checkedItems.includes(cart.cart_id));

      this.checkedOutProducts.push(...newlyCheckedOutProducts);

      this.cart = this.cart.filter(cart => !this.checkedItems.includes(cart.cart_id));

      this.checkoutSuccess = true;
      setTimeout(() => {
        this.checkoutSuccess = false;
        this.checkedItems = []; 
      }, 2000);
    } else {
      console.error('Checkout failed:', response.data.message);
    }
  } catch (error) {
    console.error('Checkout Error:', error);
  }
},







check(cartId) {
  const index = this.checkedItems.indexOf(cartId);

  if (index === -1) {
    this.checkedItems = [...this.checkedItems, cartId];
  } else {
    this.checkedItems = this.checkedItems.filter(item => item !== cartId);
  }
  console.log('Selected Items:', this.checkedItems);
},
  

    getcheckedItems() {
      return this.cart.filter(item => item.selected);
    },

  },


};
</script>

<style scoped>
@import '@/assets/css/bootstrap.min.css';
@import '@/assets/css/style.css';
@media (max-width: 768px) {
  .floating-container {
    position: fixed;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
  }

  .shopping-cart-footer {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
  }

  .column {
    flex: 1;
    margin-right: 10px;
    /* ... existing styles ... */
  }

  .invoice-section {
    position: sticky;
    top: 20px;
  }
  .product-item {
    text-align: center;
  }

  .product-info {
    margin-top: 10px;
  }
}

.container {
  margin-top: 20px;
  padding: 20px;
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 5px;
}

.shopping-cart-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.column {
  flex: 1;
  margin-right: 10px;
}

.btn-success {
  background-color: #28a745;
  color: #fff;
}

.count-input {
  display: flex;
  align-items: center;
}

.count-input button {
  margin: 0 5px;
}

.quantity {
  margin: 0 8px;
  font-weight: bold;
  font-size: 16px;
}
</style>