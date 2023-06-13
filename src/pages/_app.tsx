import '@/styles/globals.scss'
import type {AppProps} from 'next/app'
import {Header} from "@/components/Header";
import styled from '@/styles/app.module.scss';
import {Player} from "@/components/Player";

export default function App({Component, pageProps}: AppProps) {
    return (
        <div className={styled.wrapper}>
            <main>
                <Header/>
                <Component {...pageProps} />
            </main>
            <Player/>
        </div>
    )
}
