import httpInterceptor from "../../lib/axiosConfig";

class AuthService {
  async register(
    fullname,
    username,
    school,
    email,
    password,
    confirm_password,
  ) {
    await httpInterceptor.get("/sanctum/csrf-cookie");

    const response = await httpInterceptor.post("/api/v1/register", {
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
    await httpInterceptor.get("/sanctum/csrf-cookie");

    const response = await httpInterceptor.post("/api/v1/login", {
      email,
      password,
      remember,
    });
    return response;
  }
}

export default AuthService;
