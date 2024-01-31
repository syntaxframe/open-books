import {useEffect} from "react";

export default function Home(){
  useEffect(() => {
    document.title = 'Open Books :: Home';
  }, []);
  return(
  <>
    <div>Home</div>
  </>
  )
}
