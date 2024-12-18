import { useAuthStore } from "../../stores/AuthStore";

export default async function auth({ next }) {
  const authStore = useAuthStore();

  try {
    await authStore.getUser()
  } catch (e) {
    return next({
      name: "Login",
    });
  }

  return next();
}
