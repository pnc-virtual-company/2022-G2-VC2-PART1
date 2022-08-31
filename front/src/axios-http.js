import axios from "axios";

const axiosClient = axios.create({
  baseURL: process.env.VUE_APP_API_URL,
})

axiosClient.interceptors.request.use(config =>{
  config.headers.Authorization = "Bearer " + localStorage.getItem("token");
  return config;
})

export default axiosClient;