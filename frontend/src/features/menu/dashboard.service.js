import httpInterceptor from "../../lib/axiosConfig";

class DashboardService {
  async getUser(id) {
    const response = await httpInterceptor.get(`/api/v1/dashboard/${id}`);

    return response;
  }
}

export default DashboardService;
