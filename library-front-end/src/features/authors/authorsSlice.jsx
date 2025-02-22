<<<<<<< HEAD
import { createSlice } from '@reduxjs/toolkit';

const initialState = {
  user: null, // Stores user data after login
  isAuthenticated: false,
};

const authSlice = createSlice({
  name: 'auth',
  initialState,
  reducers: {
    login: (state, action) => {
      state.user = action.payload;
      state.isAuthenticated = true;
    },
    logout: (state) => {
      state.user = null;
      state.isAuthenticated = false;
    },
  },
});

export const { login, logout } = authSlice.actions;
export default authSlice.reducer;
=======
import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';

export const fetchAuthors = createAsyncThunk('authors/fetchAuthors', async () => {
    const response = await fetch('http://localhost:8000/api/authors');
    if (!response.ok) throw new Error('Failed to fetch authors');
    return response.json();
});

const authorsSlice = createSlice({
    name: 'authors',
    initialState: {
        authors: [],
        loading: false,
        error: null,
    },
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(fetchAuthors.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(fetchAuthors.fulfilled, (state, action) => {
                state.loading = false;
                state.authors = action.payload;
            })
            .addCase(fetchAuthors.rejected, (state, action) => {
                state.loading = false;
                state.error = action.error.message;
            });
    },
});

export default authorsSlice.reducer;
>>>>>>> 2c7ad79ec5e69b387d4f66cdc52209bc404490e7
