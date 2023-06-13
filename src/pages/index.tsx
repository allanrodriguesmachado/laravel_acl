import {Inter} from 'next/font/google'
import {GetStaticProps} from 'next'
import {api} from "@/services/api";

const inter = Inter({subsets: ['latin']})

type Episodes = {
    id: string;
    title: string;
}

type HomeProps = {
    episodes: Episodes
}

export default function Home({episodes}: HomeProps) {
    return <h1> {episodes.title}</h1>
}

export const getStaticProps: GetStaticProps = async () => {
    const {data} = await api.get('episodes', {
        params: {
            _limit: 12,
            _sort: 'published_at',
            order: 'desc'
        }
    })

    return {
        props: {
            episodes: data
        },
        revalidate: 60 * 60 * 8
    }
}