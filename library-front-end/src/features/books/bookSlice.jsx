import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// Async Thunks
export const fetchBooks = createAsyncThunk("books/fetchBooks", async () => {
  const response = await axios.get("https://your-api-url.com/books");
  return response.data;
});

export const addBook = createAsyncThunk("books/addBook", async (bookData) => {
  const response = await axios.post("https://your-api-url.com/books", bookData);
  return response.data;
});

export const deleteBook = createAsyncThunk("books/deleteBook", async (bookId) => {
  await axios.delete(`https://your-api-url.com/books/${bookId}`);
  return bookId;
});

const bookSlice = createSlice({
  name: "books",
  initialState: {
    books: [],
    loading: false,
    error: null,
  },
  reducers: {
    setBooks: (state, action) => {
      state.books = action.payload;
    },
    setLoading: (state, action) => {
      state.loading = action.payload;
    },
    setError: (state, action) => {
      state.error = action.payload;
    },
  },
  extraReducers: (builder) => {
    builder
      .addCase(fetchBooks.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchBooks.fulfilled, (state, action) => {
        state.loading = false;
        state.books = action.payload;
      })
      .addCase(fetchBooks.rejected, (state, action) => {
        state.loading = false;
        state.error = action.error.message;
      })
      .addCase(addBook.fulfilled, (state, action) => {
        state.books.push(action.payload);
      })
      .addCase(deleteBook.fulfilled, (state, action) => {
        state.books = state.books.filter((book) => book.id !== action.payload);
      });
  },
});

// Export actions and reducer
export const { setBooks, setLoading, setError } = bookSlice.actions;
export default bookSlice.reducer;
