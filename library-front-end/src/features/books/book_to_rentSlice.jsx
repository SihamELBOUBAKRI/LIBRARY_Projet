import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// Async Thunk to Fetch Rentable Books
export const fetchBooksToRent = createAsyncThunk(
  "booksToRent/fetchBooksToRent",
  async () => {
    const response = await axios.get("https://your-api-url.com/books-to-rent");
    return response.data;
  }
);

const bookToRentSlice = createSlice({
  name: "booksToRent",
  initialState: { books: [], loading: false, error: null },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(fetchBooksToRent.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchBooksToRent.fulfilled, (state, action) => {
        state.loading = false;
        state.books = action.payload;
      })
      .addCase(fetchBooksToRent.rejected, (state, action) => {
        state.loading = false;
        state.error = action.error.message;
      });
  },
});

export default bookToRentSlice.reducer;
