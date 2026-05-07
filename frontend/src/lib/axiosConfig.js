import axios from "axios";

// Axios instance digunakan untuk mendefinisikan configurasi dasar axios
const httpInterceptor = axios.create({
  baseURL: import.meta.env.VITE_API_URL,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
  withCredentials: true,
  withXSRFToken: true,
});

// (Interceptor/pencegat) request berjalan sebelum request dikirim ke api
// api.interceptors.request.use((config) => {
//   /**
//    * Interceptor auth digunakan untuk set authorization bearer ke client untuk mengakses route api dengan token
//    */

//   // Ambil token dari localstorage
//   const token = localStorage.getItem("token");

//   // Cek apakah token ada
//   if (token) {
//     console.log(token);
//     config.headers.Authorization = `Bearer ${token}`;
//     console.log(config.headers)
//   } else {
//     console.log("No token available");
//   }
// });

httpInterceptor.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    if (error.response?.status === 422) {
      return Promise.reject(error.response);
    }
    // } else if (error.response?.status === 401) {
    //   window.location.href = "/login";
    // }
    return Promise.reject(error);
  },
);

export default httpInterceptor;
