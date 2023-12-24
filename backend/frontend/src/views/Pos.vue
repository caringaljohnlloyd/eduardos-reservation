<template>
  <TopAdmin />
  <div class="content-wrapper">
    <HeaderAdmin />
  </div>

  <!-- Table Product -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <SidebarAdmin />
      </div>
      <div class="col-md-9">
        <!-- Adjusted the column width -->
        <div class="row">
          <h2>POS</h2>

          <div class="row g-4">
            <div v-for="shop in shop" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="room-item shadow rounded overflow-hidden">
                <div class="position-relative">
                  <img class="img-fluid menu" style="width: 200%; max-width: 500px; height: 330px"
                    :src="require('@/assets/img/' + shop.prod_img)" alt="" />
                  <small
                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                    Php. {{ shop.prod_price }}
                  </small>
                </div>
                <div class="p-4 mt-2">
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0 text-dark">
                      {{ shop.prod_name }}
                    </h5>
                    <div class="ps-2">
                      <star-rating :initialRating="shop.rating"
                        @rating-selected="updateRating(shop.shop_id, $event)"></star-rating>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <small class="border-end me-3 pe-3">
                      Quantity: {{ shop.prod_quantity }}
                    </small>
                  </div>
                  <p class="text-body mb-3">
                    {{ shop.prod_desc }}
                  </p>
                  <div class="d-flex justify-content-between">
                    <div class="input-group">
                      <input type="number" class="form-control text-center" v-model="selectedQuantity" min="1" />
                    </div>
                    <button class="btn text-primary btn-lg-square rounded-circle mx-2" @click="addCart(shop.shop_id)">
                      <i class="fa fa-shopping-cart"> Add to Cart </i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="successMessage" class="alert alert-primary mt-3" role="alert">
              {{ successMessage }}
            </div>
          </div>
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
                        <div class="custom-control custom-checkbox" style="
                            float: left;
                            margin-right: 10px;
                            margin-top: 10px;
                          ">
                          <input type="checkbox" :id="'checkbox_' + cart.cart_id" v-model="checkedItems"
                            :value="cart.cart_id" @click="check(cart.cart_id)" />
                          <label class="custom-control-label" :for="'checkbox' + cart.shop_id"></label>
                        </div>
                        <a class=""><img class="img-fluid menu" style="
                              width: 100%;
                              max-width: 250px;
                              height: 200px;
                              margin-top: 5px;
                            " :src="require('@/assets/img/' + getImg(cart).prod_img)
                              " alt="Product" /></a>
                        <div class="product-info">
                          <h4 class="product-title">
                            {{ getInfo(cart).prod_name }}
                          </h4>
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

                    <td class="align-middle text-center text-lg text-medium">
                      {{ getPrice(cart).prod_price }}
                    </td>
                    <td class="align-middle text-center text-lg text-medium">
                      {{ getTotal(cart) }}
                    </td>
                    <td class="align-middle text-center">
                      <button @click="deleteCart(cart.cart_id)" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="floating-container">
              <div class="container">
                <div class="shopping-cart-footer">
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
                          <td>
                            Php.{{ getPrice(getCartItem(cartId)).prod_price }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div>
                      <h4>Total:</h4>
                      <span class="text-medium">Php.{{ calculateSubtotal() }}</span>
                    </div>
                  </div>
                  <div class="column checkout-button-section">
                    <div class="shopping-cart-footer">
                      <div class="column">
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
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
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

            <br />
            <br />
            <br />
            <br />
            <br />
            <Notification v-if="insufficientStockError" :show="insufficientStockError" type="error"
              message="Insufficient stock for one or more items" />
            <Notification v-if="notification.show" :show="notification.show" :type="notification.type"
              :message="notification.message" />

            <Notification v-if="checkoutSuccess" :show="checkoutSuccess" type="success" message="Checkout successful!" />
            <Notification v-if="checkoutError" :show="checkoutError" type="error"
              message="Please select items before proceeding with the checkout." />
          </div>
        </div>
      </div>
    </div>
  </div>
  <Notification :show="notification.show" :type="notification.type" :message="notification.message" />
  <EndAdmin />
</template>

<script>
import axios from "axios";
import Notification from "@/components/Notification.vue";
import TopAdmin from "@/components/TopAdmin.vue";
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import EndAdmin from "@/components/EndAdmin.vue";
import SidebarAdmin from "@/components/SidebarAdmin.vue";

export default {
  components: {
    TopAdmin,
    HeaderAdmin,
    Notification,
    EndAdmin,
    SidebarAdmin,
  },
  data() {
    return {
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
      shop: [],
      name: [],
      quantity: 1,
      selectedQuantity: 1, // default quantity
      notification: {
        show: false,
        type: "", // "success" or "error"
        message: "",
      },
    };
  },
  mounted() {
    this.getCart();
    this.getInfo();
    this.getPrice();
    this.getImg();
    this.getShop();
  },
  methods: {
    getCartItem(cartId) {
      return this.cart.find((cart) => cart.cart_id === cartId) || {};
    },
    async getCart() {
      const id = sessionStorage.getItem("id");
      try {
        const [prod, user, shop] = await Promise.all([
          axios.get(`/getProd/${id}`),
          axios.get("/getData"),
          axios.get("/getShop"),
        ]);

        this.cart = prod.data.map((item) => ({
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
      const shop =
        this.prod_name.find((shop) => shop.shop_id === prod.shop_id) || {};
      console.log(`Product Name: ${shop.prod_name}, Price: ${shop.prod_price}`);
      return shop;
    },

    getPrice(prod) {
      return (
        this.prod_price.find((shop) => shop.shop_id === prod.shop_id) || {}
      );
    },
    getImg(prod) {
      return this.prod_img.find((shop) => shop.shop_id === prod.shop_id) || {};
    },
    async deleteCart(delcart) {
      const confirmResult = await new Promise((resolve) => {
        const confirmDialog = window.confirm(
          "Do you want to DELETE this item?"
        );
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

          this.cart = this.cart.filter((item) => item.cart_id !== delcart);
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
      if (action === "increment" && cart.quantity < this.getMaxQuantity(cart)) {
        cart.quantity++;
      } else if (action === "decrement" && cart.quantity > 1) {
        cart.quantity--;
      }

      this.updateTotalPrice(cart);
    },
    updateTotalPrice(cart) {
      const item = this.getInfo(cart);
      const newTotal = (item.prod_price || 0) * cart.quantity;

      axios
        .post("/updateCartQuantity", {
          cart_id: cart.cart_id,
          quantity: cart.quantity,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error("Error updating quantity:", error);
        });
    },
    getTotal(prod) {
      const item = this.getInfo(prod);
      return (item.prod_price || 0) * prod.quantity;
    },

    calculateSubtotal() {
      const subtotal = this.checkedItems
        .reduce((total, cartId) => {
          const prod = this.cart.find((item) => item.cart_id === cartId);
          if (prod) {
            const item = this.getInfo(prod);
            const itemTotal = (item.prod_price || 0) * prod.quantity;
            console.log(
              `Cart ID: ${cartId}, Product Name: ${item.prod_name}, Price: ${item.prod_price}, Item Total: ${itemTotal}`
            );
            return total + itemTotal;
          }
          return total;
        }, 0)
        .toFixed(2);

      console.log("Selected Items:", this.checkedItems);

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

        const orderItems = this.checkedItems.map((cartId) => {
          const cart = this.cart.find((cart) => cart.cart_id === cartId);
          const shop_id = cart ? cart.shop_id : null;

          return {
            shop_id: shop_id,
            quantity: cart ? cart.quantity : 0,
            total_price: this.getTotal(cart),
          };
        });

        const orderData = {
          id: id,
          status: "pending",
          total_price: parseFloat(this.calculateSubtotal()),
          items: orderItems,
        };

        const response = await axios.post("checkout", orderData);

        if (response.status === 400) {
          console.warn("Insufficient stock for one or more items");
          this.notification = {
            show: true,
            type: "error",
            message: "Insufficient stock for one or more items",
          };
          setTimeout(() => {
            this.notification = {
              show: false,
              type: "",
              message: "",
            };
          }, 3000);
          return;
        }

        if (response.status === 200) {
          const invoice_id = response.data.invoice_id;

          const newlyCheckedOutProducts = this.cart.filter((cart) =>
            this.checkedItems.includes(cart.cart_id)
          );

          this.checkedOutProducts.push(...newlyCheckedOutProducts);

          this.cart = this.cart.filter(
            (cart) => !this.checkedItems.includes(cart.cart_id)
          );

          this.checkoutSuccess = true;
          setTimeout(() => {
            this.checkoutSuccess = false;
            this.checkedItems = [];
          }, 2000);
        } else {
          console.error("Checkout failed:", response.data.message);
        }
      } catch (error) {
        console.error("Checkout Error:", error);
      }
    },

    check(cartId) {
      const index = this.checkedItems.indexOf(cartId);

      if (index === -1) {
        this.checkedItems = [...this.checkedItems, cartId];
      } else {
        this.checkedItems = this.checkedItems.filter((item) => item !== cartId);
      }
      console.log("Selected Items:", this.checkedItems);
    },

    getcheckedItems() {
      return this.cart.filter((item) => item.selected);
    },
    updateRating(shop_id, rating) {
      this.submitRatingToBackend(shop_id, rating);
    },
    updateQuantity(amount) {
      // Update quantity based on the plus or minus button clicked
      this.quantity += amount;
      // Ensure quantity is at least 1
      if (this.quantity < 1) {
        this.quantity = 1;
      }
    },
    async submitRatingToBackend(shop_id, rating) {
      try {
        const response = await axios.post("/submit-rating", {
          shop_id,
          rating,
        });
        console.log(response.data);
      } catch (error) {
        console.error(error);
      }
    },
    async getFeed() {
      const [g, n] = await Promise.all([
        axios.get("/getFeedback"),
        axios.get("/getData"),
      ]);
      this.feed = g.data;
      this.name = n.data;
    },
    getName(g) {
      return this.name.find((n) => n.id === g.id) || {};
    },
    async getRoom() {
      const r = await axios.get("/getRoom");
      this.room = r.data;
    },
    async getShop() {
      const s = await axios.get("/getShop");
      this.shop = s.data;
    },
    updateQuantity(product, increment) {
      product.selectedQuantity = (product.selectedQuantity || 0) + increment;

      if (product.selectedQuantity < 0) {
        product.selectedQuantity = 0;
      }
    },

    async addCart(shop_id, quantity) {
      try {
        const id = sessionStorage.getItem("id");
        const product = this.shop.find((item) => item.shop_id === shop_id);
        const quantity = this.selectedQuantity;

        if (product.prod_quantity >= quantity) {
          const response = await axios.post("getCart", {
            shop_id: shop_id,
            id: id,
            quantity: quantity,
          });

          this.showSuccessNotification("Product added to cart successfully");

          setTimeout(() => {
            this.successMessage = "";
          }, 2000);
        } else {
          this.showErrorNotification("Product is out of stock");
        }
      } catch (error) {
        console.error("Error adding to cart", error);
      }
    },
    showSuccessNotification(message) {
      this.notification = {
        show: true,
        type: "success",
        message: message,
      };

      setTimeout(() => {
        this.notification.show = false;
      }, 2000);
    },
    showErrorNotification(message) {
      this.notification = {
        show: true,
        type: "error",
        message: message,
      };

      setTimeout(() => {
        this.notification.show = false;
      }, 2000);
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

        const orderItems = this.checkedItems.map((cartId) => {
          const cart = this.cart.find((cart) => cart.cart_id === cartId);
          const shop_id = cart ? cart.shop_id : null;

          return {
            shop_id: shop_id,
            quantity: cart ? cart.quantity : 0,
            total_price: this.getTotal(cart),
          };
        });

        const orderData = {
          id: id,
          status: "pending",
          total_price: parseFloat(this.calculateSubtotal()),
          items: orderItems,
        };

        const response = await axios.post("checkoutpos", orderData);

        if (response.status === 400) {
          console.warn("Insufficient stock for one or more items");
          this.notification = {
            show: true,
            type: "error",
            message: "Insufficient stock for one or more items",
          };
          setTimeout(() => {
            this.notification = {
              show: false,
              type: "",
              message: "",
            };
          }, 3000);
          return;
        }

        if (response.status === 200) {
          const invoice_id = response.data.invoice_id;
          this.checkoutSuccess = true;
          setTimeout(() => {
            this.checkoutSuccess = false;
            this.cart = this.cart.filter(
              (cart) => !this.checkedItems.includes(cart.cart_id)
            );
            this.checkedItems = [];
            // this.$router.push({ name: 'invoice', params: { invoice_id: invoice_id } });
          }, 2000);
        } else {
          console.error("Checkout failed:", response.data.message);
        }
      } catch (error) {
        console.error("Checkout Error:", error);
      }
    },
  },
};
</script>

