import React from 'react';
import { Provider } from 'react-redux';
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
