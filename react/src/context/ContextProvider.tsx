import React, { createContext, useContext, useState } from "react";

interface StateContextInterface {
  currentUser: any;
  token: string | null;
  notification: string | null;
  setUser: (user: any) => void;
  setToken: (token: string | null) => void;
  setNotification: (message: string) => void;
}

const StateContext = createContext<StateContextInterface>({
  currentUser: null,
  token: null,
  notification: null,
  setUser: () => {},
  setToken: () => {},
  setNotification: () => {}
})

export const ContextProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const [user, setUser] = useState<any>({});
  const [token, _setToken] = useState<string | null>(localStorage.getItem('ACCESS_TOKEN'));
  const [notification, _setNotification] = useState<string>('');

  const setToken = (token: string | null) => {
    _setToken(token)
    if (token) {
      localStorage.setItem('ACCESS_TOKEN', token);
    } else {
      localStorage.removeItem('ACCESS_TOKEN');
    }
  }

  const setNotification = (message: string) => {
    _setNotification(message);

    setTimeout(() => {
      _setNotification('')
    }, 5000)
  }

  return (
    <StateContext.Provider value={{
      currentUser: user,
      setUser,
      token,
      setToken,
      notification,
      setNotification
    }}>
      {children}
    </StateContext.Provider>
  );
}

export const useStateContext = () => useContext(StateContext);
