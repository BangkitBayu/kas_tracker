import { reactive, readonly } from "vue";

class AuthStore {
  #authState = reactive({
    user: null,
    isAuthenticated: false,
  });

  get State() {
    return readonly(this.#authState);
  }

  set State(user) {
    this.#authState.user = user;
    this.#authState.isAuthenticated =
      this.#authState.user !== null ? true : false;
  }
}

export default new AuthStore();
