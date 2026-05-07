import httpInterceptor from "../lib/axiosConfig";

class AuthService {
  async register(
    fullname,
    username,
    school,
    email,
    password,
    confirm_password,
  ) {
    await httpInterceptor.get("http://localhost:8000/sanctum/csrf-cookie");

    const response = await httpInterceptor.post("/register", {
      fullname,
      username,
      school,
      email,
      password,
      confirm_password,
    });

    return response;
  }
  async login(email, password, remember) {
    await httpInterceptor.get("http://localhost:8000/sanctum/csrf-cookie");

    const response = await httpInterceptor.post("/login", {
      email,
      password,
      remember,
    });
    return response;
  }
}

export default AuthService;
