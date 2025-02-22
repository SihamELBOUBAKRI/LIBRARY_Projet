import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// Async Thunk to Fetch Books for Sale
export const fetchBooksToSell = createAsyncThunk(
  "booksToSell/fetchBooksToSell",
  async () => {
    const response = await axios.get("https://your-api-url.com/books-to-sell");
    return response.data;
  }
);

const bookToSellSlice = createSlice({
  name: "booksToSell",
  initialState: { books: [], loading: false, error: null },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(fetchBooksToSell.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchBooksToSell.fulfilled, (state, action) => {
        state.loading = false;
        state.books = action.payload;
      })
      .addCase(fetchBooksToSell.rejected, (state, action) => {
        state.loading = false;
        state.error = action.error.message;
      });
  },
});

export default bookToSellSlice.reducer;
