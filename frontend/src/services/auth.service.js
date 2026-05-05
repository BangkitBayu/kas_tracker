import httpInterceptor from "../utils/axiosConfig";

class AuthService {
  async register(
    fullname,
    username,
    school,
    email,
    password,
    confirm_password,
  ) {
    const response = await httpInterceptor.post("/register", {
      fullname,
      username,
      school,
      email,
      password,
      confirm_password,
    });

    return response
  }
}

export default AuthService;