import React from "react";
import "./TweetInFeed.css";
import golf from "../images/golf.png";
import canoe from "../images/canoe.png";
import { defaultImgs } from "../defaultimgs";
import { Icon, Modal, Typography, Input } from "web3uikit";
import { useMoralis } from "react-moralis";
import { useEffect, useState } from "react";
import DefaultComponent from "./CommentComponent";

const TweetInFeed = ({ profile }) => {
  const [tweetArr, setTweetArr] = useState();
  const { Moralis, account } = useMoralis();
  useEffect(() => {
    async function getTweets() {
      try {
        const Tweets = Moralis.Object.extend("Tweets");
        const query = new Moralis.Query(Tweets);
        if (profile) {
          query.equalTo("tweeterAcc", account);
        }
        const results = await query.find();

        setTweetArr(results);
        console.log(results);
      } catch (error) {
        console.error(error);
      }
    }
    getTweets();
  }, [profile]);

  return (
    <>
      {tweetArr?.map((e, key) => {
        console.log(key)
        return (
          <>
            <div className="feedTweet">
              <img src={e.attributes.tweeterPfp ? e.attributes.tweeterPfp : defaultImgs[0]} className="profilePic"></img>
              <div className="completeTweet">
                <div className="who">
                {e.attributes.tweeterUserName.slice(0, 6)}  
                {console.log(e.attributes.createdAt)}
                {console.log(e.attributes)}
                  <div className="accWhen">{
                        `${e.attributes.tweeterAcc.slice(0, 4)}...${e.attributes.tweeterAcc.slice(38)} · 
                        ${e.attributes.createdAt.toLocaleString('en-us', { month: 'short' })}  
                        ${e.attributes.createdAt.toLocaleString('en-us', { day: 'numeric' })}
                        `  
                      }
                      </div>
                </div>
                <div className="tweetContent">
                {e.attributes.tweetTxt}
                {e.attributes.tweetImg && (
                        <img
                          src={e.attributes.tweetImg}
                          className="tweetImg"
                        ></img>
                      )}
                </div>
                <div className="interactions">
                  <div className="interactionNums" onClick={(e) => {
                      if (e.target.parentElement.parentElement.childNodes[3].style.display == 'block')
                        e.target.parentElement.parentElement.childNodes[3].style.display = 'none'
                      else 
                        e.target.parentElement.parentElement.childNodes[3].style.display = 'block'
                  }}>
                    <Icon id={"comment"+key} fill="#3f3f3f" size={20} svg="messageCircle" />
                  </div>
                  <div id={"like"+key} className="interactionNums" onClick={() => {
                    let color = document.getElementById("like"+key).firstChild.firstChild.childNodes[1].attributes[1].value
                    if (color == "#3f3f3f")
                      document.getElementById("like"+key).firstChild.firstChild.childNodes[1].attributes[1].value = "#ff1493"
                    else 
                      document.getElementById("like"+key).firstChild.firstChild.childNodes[1].attributes[1].value = "#3f3f3f"
                  }}>
                    <Icon fill="#3f3f3f" size={20} svg="star" />
                    12
                  </div>
                  <div className="interactionNums">
                    <Icon fill="#3f3f3f" size={20} svg="matic" />
                  </div>
                </div>
                <div class="comment-section">
                  <DefaultComponent></DefaultComponent>
                </div>
              </div>
            </div>
          </>
        );
      }).reverse()}
    </>
  );
};

export default TweetInFeed;
