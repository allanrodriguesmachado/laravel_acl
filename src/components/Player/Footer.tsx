import styled from "@/components/Player/styles.module.scss";

export function Footer() {
    return (
        <footer className={styled.empty}>
            <div className={styled.progress}>
                <span>00:00</span>
                <div className={styled.slider}>
                    <div className={styled.emptySlider}/>
                </div>
                <span>00:00</span>
            </div>

            <div className={styled.buttons}>
                <button type="button">
                    <img src="/shuffle.svg" alt=""/>
                </button>

                <button type="button">
                    <img src="/play-previous.svg" alt=""/>
                </button>

                <button type="button" className={styled.playButton}>
                    <img src="/play.svg" alt=""/>
                </button>

                <button type="button">
                    <img src="/play-next.svg" alt=""/>
                </button>

                <button type="button">
                    <img src="/repeat.svg" alt=""/>
                </button>
            </div>
        </footer>
    )
}