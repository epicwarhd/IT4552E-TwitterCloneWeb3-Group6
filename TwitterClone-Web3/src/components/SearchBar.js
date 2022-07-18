import React from 'react'
import './SearchBar.css';
import { TextArea } from 'web3uikit';
import { Input } from 'web3uikit';

const SearchBar = () => {
  const data = [
    {
      name: 'dung',
      tweetImg: 'https://scontent.fhan2-2.fna.fbcdn.net/v/t39.30808-1/281495229_1764542407211310_8174834509622889647_n.jpg?stp=cp0_dst-jpg_p80x80&_nc_cat=110&ccb=1-7&_nc_sid=7206a8&_nc_ohc=gxOWlODze64AX9PQfvv&_nc_ht=scontent.fhan2-2.fna&oh=00_AT-_GVYdPlbaLxrrLFchyXaTzpBCqlCpI3RmBkHYvZUY7A&oe=62DAB8DF',
      createdAt: new Date('Sat Jul 16 2022 17:56:20 GMT+0700 (Indochina Time)'),
      tweeterAcc: '0x6bfe51e48f2193bea7a88ceffd5d8dfb58d190f2',
      content: 'Hellooo'
    },
    {
      name: 'Pham Hoang',
      tweetImg: 'https://scontent.fhan14-2.fna.fbcdn.net/v/t1.6435-1/31300667_100730540795195_3598923225267961856_n.jpg?stp=c0.0.480.480a_dst-jpg_p480x480&_nc_cat=111&ccb=1-7&_nc_sid=7206a8&_nc_ohc=KH_lq6fgs7QAX-V6DMI&_nc_ht=scontent.fhan14-2.fna&oh=00_AT-ttzliL4OmH0F-JHuck3Xatl8D_S-bwUOpbKlFYr5yzA&oe=62FAD2FE',
      createdAt: new Date('Sat Jul 16 2022 17:56:20 GMT+0700 (Indochina Time)'),
      tweeterAcc: '0x6bfe51e48f2193bea7a88ceffd5d8dfb58d190f2',
      content: 'Tuan Dung is my father'
    }
  ];
  return (
    <>
        <header className='search-header'>
            
            <Input
                label="Label text"
                name="Test text Input"
                onBlur={function noRefCheck(){}}
                onChange={function noRefCheck(){}}
                value={50}
            />
        </header>
    </>
  );
}

export default SearchBar