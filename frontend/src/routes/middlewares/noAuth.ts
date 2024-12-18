import { useAuthStore } from "../../stores/AuthStore";

export default async function auth({ next }) {
  const authStore = useAuthStore();

  try {
    await authStore.getUser()

    return next({
      name: "Home",
    });
  } catch (e) {
    return next();
  }
}
