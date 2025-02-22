import React from 'react';
import { Provider } from 'react-redux';
<<<<<<< HEAD
=======
import authReducer from './features/auth/authSlice';
import cartReducer from './features/cart/cartSlice';
import usersReducer from './features/users/usersSlice';
import ordersReducer from './features/orders/ordersSlice';
import wishlistReducer from './features/wishlist/wishlistSlice';
import categoryReducer from './features/categories/categorySlice';
import authorsReducer from './features/authors/authorsSlice'; // authorsSlice.js
import book_to_rentReducer from './features/book_to_rent/book_to_rentSlice'; // book_to_rentSlice.js
import book_to_sellReducer from './features/book_to_sell/book_to_sellSlice'; // book_to_sellSlice.js
import membershipReducer from './features/membership/membershipSlice'; // membershipSlice.js
import overdueReducer from './features/overdues/overduesSlice'; // overdueSlice.js
import purshasesReducer from './features/purshases/purshasesSlice'; // purchasesSlice.js
import rentalsReducer from './features/rentals/rentalsSlice'; // rentalsSlice.js
import transactionsReducer from './features/transactions/transactionsSlice'; // transactionsSlice.js
import active_rentalsReducer from './features/active_rentals/active_rentalsSlice'; // active_rentalsSlice.js


>>>>>>> 2c7ad79ec5e69b387d4f66cdc52209bc404490e7
import { configureStore } from '@reduxjs/toolkit';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import './index.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import App from './App';

// Importing Redux Slices

import authReducer from './features/auth/authSlice';
import cartReducer from './features/cart/cartSlice';
import userReducer from './features/users/userSlice';
import orderReducer from './features/orders/orderSlice';
import wishlistReducer from './features/wishlist/wishlistSlice';
import categoryReducer from './features/categories/categorySlice';
import bookToRentReducer from './features/books/book_to_rentSlice';
import bookToSellReducer from './features/books/book_to_sellSlice';

// Configuring the Redux Store
const store = configureStore({
<<<<<<< HEAD
  reducer: {
    auth: authReducer,
    cart: cartReducer,
    users: userReducer,
    orders: orderReducer,
    wishlist: wishlistReducer,
    categories: categoryReducer,
    bookToRent: bookToRentReducer,
    bookToSell: bookToSellReducer,
  },
});
=======
    reducer: {
      auth: authReducer,
      cart: cartReducer,
      wishlist: wishlistReducer,
      categories: categoryReducer,
      users: usersReducer,
      orders: ordersReducer,
      authors: authorsReducer,
      book_to_rent: book_to_rentReducer,
      book_to_sell: book_to_sellReducer,
      membership: membershipReducer,
      overdue: overdueReducer,
      purshases: purshasesReducer,
      rentals: rentalsReducer,
      transactions: transactionsReducer,
      active_rentals: active_rentalsReducer,
    },
  });
>>>>>>> 2c7ad79ec5e69b387d4f66cdc52209bc404490e7

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Provider store={store}>
      <BrowserRouter>
        <App />
      </BrowserRouter>
    </Provider>
  </React.StrictMode>
);
