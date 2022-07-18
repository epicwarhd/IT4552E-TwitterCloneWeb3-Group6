import React from 'react'
import './SearchBar.css';
import { TextArea } from 'web3uikit';
import { Input } from 'web3uikit';
import ArrowBackIcon from '@mui/icons-material/ArrowBack';
import MoreHorizIcon from '@mui/icons-material/MoreHoriz';
const SearchBar = () => {
  const data = [
    {
      name: 'dung',
      tweetImg: 'https://scontent.fhan2-2.fna.fbcdn.net/v/t39.30808-1/281495229_1764542407211310_8174834509622889647_n.jpg?stp=cp0_dst-jpg_p80x80&_nc_cat=110&ccb=1-7&_nc_sid=7206a8&_nc_ohc=gxOWlODze64AX9PQfvv&_nc_ht=scontent.fhan2-2.fna&oh=00_AT-_GVYdPlbaLxrrLFchyXaTzpBCqlCpI3RmBkHYvZUY7A&oe=62DAB8DF',
      tweeterAcc: '0x6bfe51e48f2193bea7a88ceffd5d8dfb58d190f2',
      content: 'Building web3 infrastructure at 💚🔨 🏆 Full-Stack Web3 Workflow 🥂 Go to market in days not months'
    },
    {
      name: 'Pham Hoang',
      tweetImg: 'https://scontent.fhan14-2.fna.fbcdn.net/v/t1.6435-1/31300667_100730540795195_3598923225267961856_n.jpg?stp=c0.0.480.480a_dst-jpg_p480x480&_nc_cat=111&ccb=1-7&_nc_sid=7206a8&_nc_ohc=KH_lq6fgs7QAX-V6DMI&_nc_ht=scontent.fhan14-2.fna&oh=00_AT-ttzliL4OmH0F-JHuck3Xatl8D_S-bwUOpbKlFYr5yzA&oe=62FAD2FE',
      tweeterAcc: '0x6bfe51e48f2193bea7a88ceffd5d8dfb58d190f2',
      content: 'Tuan Dung is my father'
    }
  ];
  var searchKey;
  return (
    <>
        <header className='search-header'>
            <ArrowBackIcon className='back-icon'/>
            <Input
                label="Search a name"
                name="Test text Input"
                onBlur={function noRefCheck(){}}
                onChange={function noRefCheck(e){
                  searchKey = e.target.value
                }}
                value={50}
                width="500px"
            />
            <MoreHorizIcon className='more-horiz-icon'></MoreHorizIcon>
        </header>
        <body className='search-body'>
          <h2>People</h2>
          {
            data?.map((e, key) => {
                return(
                  <div className='search-element'>
                    <img src={e.tweetImg} className="profilePic"></img>
                    <div className="info">
                      <div className="name">
                        {e.name.slice(0, 6)}
                      </div>
                      <div className="user-account">
                        {'@'+e.tweeterAcc.slice(0, 4)}...${e.tweeterAcc.slice(38)}
                      </div>
                      <div className="user-description">
                        {e.content}
                      </div>
                    </div>
                  </div>
                )
            })
          } 
        </body>
    </>
  );
}

export default SearchBar