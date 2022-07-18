import React from 'react'
import './CommentComponent.css';
import { Icon, Modal, Typography, Input } from "web3uikit";
import './TweetInFeed.css';
import { TextArea } from 'web3uikit';

function CommentComponent() {
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
      <div className='post-comment'>
        <img src={data[0].tweetImg} className="profilePic"></img>
        <div className="tweetBox">
            <TextArea
              label=""
              name="tweetTxtArea"
              value="Tweet your reply here"
              type="text"
              //onChange={}
              width="95%"
            ></TextArea>
            <div className="imgOrTweet">
              <div className="imgDiv">
                <Icon fill="#1DA1F2" size={20} svg="image"></Icon>
              </div>
              <div className="tweetOptions">
                {/* <div className="tweet" onClick={saveTweet}>Tweet</div> */}
                <div className="tweet" style={{ backgroundColor: "#8247e5" }}>
                  <Icon fill="#ffffff" size={20} svg="eth" title="Tweet" />
                </div>
              </div>
            </div>
          </div>
      </div>
      { 
        data?.map((e, key) => {
          console.log(key)
          return (
            <div className='comment-container'>
              <img src={e.tweetImg} className="profilePic"></img>
              <div className="completeTweet">
                  <div className="who">
                    {e.name.slice(0, 6)}
                    <div className="accWhen">
                      {
                          `${e.tweeterAcc.slice(0, 4)}...${e.tweeterAcc.slice(38)} · 
                            ${e.createdAt.toLocaleString('en-us', { month: 'short' })}  
                            ${e.createdAt.toLocaleString('en-us', { day: 'numeric' })}
                          `  
                      }
                    </div>
                  </div>
                <div className="tweetContent">
                    {e.content}
                </div>
                <div className="interactions">
                  <div className="interactionNums" onClick={() => {
                      document.querySelector(".modal").style.display = "flex"
                  }}>
                    <Icon fill="#3f3f3f" size={20} svg="messageCircle" />
                  </div>
                  <div className="interactionNums">
                    <Icon fill="#3f3f3f" size={20} svg="star" />
                    12
                  </div>
                  <div className="interactionNums">
                    <Icon fill="#3f3f3f" size={20} svg="matic" />
                  </div>
                </div>
              </div>
            </div>
          )
        })
      }
    </>
  );
}

export default CommentComponent